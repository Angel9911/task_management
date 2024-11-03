<?php

namespace App\Controller;

use App\DTOs\TaskDto;
use App\DTOs\UserDto;
use App\Entity\Task;
use App\Service\TaskService;
use App\Service\UserService;
use App\utils\ObjectMapper;
use Doctrine\ORM\Exception\NotSupported;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TaskController extends AbstractController
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;

    }

    /**
     * @Route("/task/create", methods={"POST"})
     * @throws NotSupported
     */
    public function createTask(TaskDto $taskDto, ValidatorInterface $validator): JsonResponse
    {
        $errors = $this->validateObject($taskDto, $validator);

        if(!empty($errors)) {

            return new JsonResponse(['errors' => $errors], Response::HTTP_BAD_REQUEST);
        }

        try{

            $task = $this->taskService->createTask($taskDto);

            return new JsonResponse(ObjectMapper::mapObjectToJson($task->toArray()), Response::HTTP_CREATED);

        }catch (ORMException $exception){

            return new JsonResponse($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @Route("/task/update/{id}", methods={"PUT"})
     */
    public function updateTask(int $id, Request $request)
    {
        $data = ObjectMapper::mapJsonToObject($request->getContent());

        $status = $data['status'] ?? null;

        if(!$status){
            return new Response('Invalid input', Response::HTTP_BAD_REQUEST);
        }

        try {
            $updatedTask = $this->taskService->updateTaskStatus($id,$status);

            return new JsonResponse(ObjectMapper::mapObjectToJson($updatedTask->toArray()), Response::HTTP_CREATED);

        } catch (NotFoundHttpException $exception){

            return new JsonResponse($exception->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (OptimisticLockException|ORMException $e) {

            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/task/delete', methods: ['DELETE'])]
    public function deleteTask(Request $request): JsonResponse
    {
        //$id = $request->query->get('id'); // /user/delete?id=2
        $data = ObjectMapper::mapJsonToObject($request->getContent());

        $id = $data['id'] ?? null;

        if(!$id){

            return new JsonResponse('Invalid input', Response::HTTP_BAD_REQUEST);
        }

        $this->taskService->deleteTask((int)$id);
    }

    public function getTasksByStatus($status)
    {

    }

    public function getAllTasks()
    {

    }
    private function validateObject(TaskDto $taskDto, ValidatorInterface $validator): array
    {
        $errors = $validator->validate($taskDto);
        $errorMessages = [];

        if (count($errors) > 0) {

            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
        }

        return $errorMessages;
    }
}