<?php declare(strict_types=1);

namespace App\Controller;

use App\Constraints\CacheConstraints;
use App\DTOs\TaskDto;
use App\Entity\Task;
use App\Exceptions\ObjectNotFoundException;
use App\Exceptions\ObjectNotValidException;
use App\private_lib\events\TaskEvent;
use App\Service\CacheService;
use App\Service\TaskService;
use App\Service\UserService;
use App\utils\ObjectMapper;
use App\utils\RedisWrapper;
use App\utils\ValidatorUtils;
use Doctrine\ORM\Exception\ORMException;
use phpDocumentor\Reflection\Types\Collection;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TaskController extends AbstractController
{
    private TaskService $taskService;

    private CacheService $cacheService;

    private UserService $userService;

    private LoggerInterface $logger;

    private EventDispatcherInterface $eventDispatcher;

    private $taskCache;

    public function __construct(TaskService $taskService
        , CacheService $cacheService
        , LoggerInterface $logger
        , UserService $userService
        , EventDispatcherInterface $eventDispatcher)
    {
        $this->taskService = $taskService;
        $this->userService = $userService;
        $this->cacheService = $cacheService;
        $this->logger = $logger;

        $this->eventDispatcher = $eventDispatcher;

        $this->taskCache = CacheConstraints::taskCache . ':';
    }

    #[Route('/task/create', methods: ['POST'])]
    public function createTask(TaskDto $taskDto, ValidatorInterface $validator): JsonResponse
    {
        $errors = ValidatorUtils::validateObject($taskDto,$validator);
        var_dump(openssl_get_cert_locations());
        if(!empty($errors)) {

            throw new ObjectNotValidException('Task is not valid. The following errors occurred:'.implode("\n",$errors));
        }

        try{

            $task = $this->taskService->createTask($taskDto);

            $this->updateUserCache($task->getAssignedUser()->getUsername());// invalidate cache when the new user's task is created and assigned.

            // $this->eventDispatcher->dispatch(new TaskEvent($task), TaskEvent::NAME);

            return new JsonResponse(ObjectMapper::mapObjectToJson($task->toArray()), Response::HTTP_CREATED);

        }catch (ORMException $exception){

            return new JsonResponse($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);

        } catch (\RedisException $e) {

            return new JsonResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route('/task/update/{id}', methods: ['PUT'])]
    public function updateTask(int $id, Request $request): JsonResponse|Response
    {
        $data = ObjectMapper::mapJsonToObject($request->getContent());

        $status = $data['status'] ?? null;

        if(!$status){

            return new Response('Invalid input', Response::HTTP_BAD_REQUEST);
        }

        try {

            $currentTask = $this->taskService->getTaskById($id);

            $taskUser = $currentTask->getAssignedUser();

            $updatedTask = $this->taskService->updateTaskStatus($id,$status);

            $this->updateUserCache($taskUser->getUsername());

            return new JsonResponse($updatedTask->toArray(), Response::HTTP_CREATED);

        } catch (ObjectNotFoundException $e){

            $this->logger->error('Failed to update task: ',
            [
                'source' => 'controller',
                'controller' => __CLASS__,
                'method' => __METHOD__,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return new JsonResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (\RedisException $e) {

            $this->logger->error('Failed to update redis: ',
                [
                    'source' => 'controller',
                    'controller' => __CLASS__,
                    'method' => __METHOD__,
                    'exception' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);
        }
        return new JsonResponse($updatedTask->toArray(), Response::HTTP_CREATED);
    }

    #[Route('/task/delete', methods: ['DELETE'])]
    public function deleteTask(Request $request): JsonResponse
    {
        $id = $request->query->get('id'); // /user/delete?id=2

        if(!$id){

            return new JsonResponse('Invalid input', Response::HTTP_BAD_REQUEST);
        }

        try {

            $this->taskService->deleteTask((int)$id);

            return new JsonResponse('', Response::HTTP_NO_CONTENT); // instead using HTTP_OK

        }catch (ObjectNotFoundException $e){

            $this->logger->error('Failed to delete task: ',
            [
                'source' => 'controller',
                'controller' => __CLASS__,
                'method' => __METHOD__,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return new JsonResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    #[Route('/task/user', methods: ['GET'])]
    public function getTasksByStatusAndUsername(Request $request): JsonResponse
    {
        $getStatus = $request->query->filter('status',null,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $getUsername = $request->query->get('username');//$request->query->filter('username',null,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(empty($getStatus) || empty($getUsername) || !ValidatorUtils::validateString($getStatus) || !ValidatorUtils::validateString($getUsername)){

            return new JsonResponse("Invalid input", Response::HTTP_BAD_REQUEST);
        }

        try{

            $tasks = $this->taskService->getTasksByUsernameAndStatus($getUsername,$getStatus);

            return new JsonResponse($tasks, Response::HTTP_OK);
        } catch (ObjectNotFoundException $e){

            $this->logger->error('Failed to fetch tasks by status and username',
            [
                'source' => 'controller',
                'controller' => __CLASS__,
                'method' => __METHOD__,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return new JsonResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }

    }

    #[Route('/task/user', methods: ['GET'])]
    public function getTasksByUsername(Request $request): JsonResponse
    {
        $getUsername = $request->query->filter('username', null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(empty($getUsername)){

            return new JsonResponse('Invalid input', Response::HTTP_BAD_REQUEST);
        }

        try{

            $tasks = $this->taskService->getTasksByUsername($getUsername);

            return new JsonResponse($tasks, Response::HTTP_OK);

        }catch (ObjectNotFoundException $e){
            $this->logger->error('Failed to fetch tasks by username',
            [
                'source' => 'controller',
                'controller' => __CLASS__,
                'method' => __METHOD__,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return new JsonResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    #[Route('/task/all', methods: ['GET'])]
    public function getAllTasks(): JsonResponse
    {
        try {

            $tasks = $this->taskService->getAllTasks();

            return new JsonResponse($tasks, Response::HTTP_OK);
        }catch (ObjectNotFoundException $e){

            $this->logger->error('Failed to fetch all created tasks',
            [
                'source' => 'controller',
                'controller' => __CLASS__,
                'method' => __METHOD__,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return new JsonResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param string $username
     * @return void
     * @throws \RedisException
     */
    public function updateUserCache(string $username): void
    {
        $userKeyCache = CacheConstraints::userCache . ':' . $username; // check

        $currentCacheTasks = RedisWrapper::getCache($userKeyCache);

        if ($currentCacheTasks) {

            $updatedUserTask = $this->userService->getUserByUsername($username);

            $updateCacheTasks = $updatedUserTask->getTasks()
                ->map(fn(Task $task) => $task->toArrayWithoutUser())
                ->toArray();

            RedisWrapper::updateCache($userKeyCache, $updateCacheTasks);
        }
    }
}