<?php declare(strict_types=1);

namespace App\Controller;

use App\Constraints\CacheConstraints;
use App\DTOs\UserDto;
use App\Exceptions\ObjectNotFoundException;
use App\Exceptions\ObjectNotValidException;
use App\Service\CacheService;
use App\Service\UserService;
use App\utils\ObjectMapper;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{

    private UserService $userService;

    private CacheService $cacheService;

    private Serializer $serializer;

    private LoggerInterface $logger;

    private $userKeyCache;

    public function __construct(UserService $userService
        , CacheService $cacheService
        , LoggerInterface $logger)
    {
        $this->userService = $userService;

        $this->cacheService = $cacheService;

        $this->logger = $logger;

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer =  new Serializer($normalizers, $encoders);

        $this->userKeyCache = CacheConstraints::userCache . ':';
    }

    #[Route('/user/create', methods: ['POST'])]
    #[IsGranted("ROLE_USER")]
    public function createUser(UserDto $userDto, ValidatorInterface $validation): JsonResponse
    {
        $errors = $this->validateObject($userDto, $validation);

        if(!empty($errors)) {

            throw new ObjectNotValidException('User not valid. The following errors occurred:'.implode("\n",$errors));
        }

        try {

            $user = $this->userService->createUser($userDto);

            $this->cacheService->set($this->userKeyCache . $user->getUsername(), $user);

            return new JsonResponse($user->toArray(), Response::HTTP_CREATED);

        } catch (OptimisticLockException|ORMException $e) {

            $this->logger->error('Failed to create user: ',
                [
                    'source' => 'controller',
                    'controller' => __CLASS__,
                    'method' => __METHOD__,
                    'exception' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);

            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/user/update/{id}', methods: ['PUT'])]
    #[IsGranted("ROLE_USER")]
    public function updateUser(int $id, UserDto $userDto, ValidatorInterface $validation): JsonResponse // /user/delete/2
    {
        $errors = $this->validateObject($userDto, $validation);

        if(!empty($errors)) {

            return new JsonResponse(['errors' => $errors], Response::HTTP_BAD_REQUEST);
        }

        try {

            $this->cacheService->delete($this->userKeyCache . $userDto->getUsername());

            $user = $this->userService->updateUser($id, $userDto);

            $this->cacheService->set($this->userKeyCache . $user->getUsername(), $user);

            return new JsonResponse(ObjectMapper::mapObjectToJson($user->toArray()), Response::HTTP_CREATED);

        } catch (ObjectNotFoundException $e){

            $this->logger->error('User not found to update: ',
                [
                    'source' => 'controller',
                    'controller' => __CLASS__,
                    'method' => __METHOD__,
                    'exception' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);

            return new JsonResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
        catch (OptimisticLockException|ORMException $e) {

            $this->logger->error('Failed to update user: ',
                [
                    'source' => 'controller',
                    'controller' => __CLASS__,
                    'method' => __METHOD__,
                    'exception' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);

            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/user/delete', methods: ['DELETE'])] // the modern approach for routing in Symfony project - 8.0 or later
    #[IsGranted("ROLE_USER")]
    public function deleteUser(Request $request): JsonResponse
    {

        $id = $request->query->get('id'); // /user/delete?id=2

        if(!$id){

            return new JsonResponse("Invalid Input", Response::HTTP_BAD_REQUEST);
        }
        try {

            $deleteUser = $this->userService->getUserByUserId($id);

            $this->userService->deleteUser($deleteUser);

            return new JsonResponse('success', Response::HTTP_OK);

        } catch (ObjectNotFoundException $e){

            return new JsonResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    #[Route('/user/tasks/{username}', methods: ['GET'])]
    #[IsGranted("ROLE_USER")]
    public function getUserTasksByUsername(string $username): JsonResponse
    {
        if(empty($username)){

            return new JsonResponse('The username can not be empty', Response::HTTP_BAD_REQUEST);
        }

        try{
            $userKeyCache = CacheConstraints::userCache . ':' . $username;

            $cacheTasks = $this->cacheService->get($userKeyCache);

            if($cacheTasks){

                $deserializeTasks = ObjectMapper::mapJsonToObject($cacheTasks);

                return new JsonResponse($deserializeTasks, Response::HTTP_OK);
            }

            $user = $this->userService->getUserByUsername($username);

            //$serializedTasks = $this->serializer->serialize($user->getTasks(), 'json');

            $this->cacheService->set($userKeyCache,ObjectMapper::mapObjectToJson($user->getTasks()));

            return new JsonResponse($user->getTasks(), Response::HTTP_OK);

        } catch (ObjectNotFoundException $e){

            $this->logger->error('Failed to get user tasks: ',
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

    private function validateObject(UserDto $userDto, ValidatorInterface $validator): array
    {
        $errors = $validator->validate($userDto);
        $errorMessages = [];

        if (count($errors) > 0) {

            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
        }

        return $errorMessages;
    }
}