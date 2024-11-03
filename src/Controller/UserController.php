<?php

namespace App\Controller;

use App\DTOs\UserDto;
use App\Entity\User;
use App\Service\UserService;
use App\utils\ObjectMapper;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * @Route("/user/create", methods={"POST"})
     */
    public function createUser(UserDto $userDto, ValidatorInterface $validation): JsonResponse
    {
        $errors = $this->validateObject($userDto, $validation);

        if(!empty($errors)) {

            return new JsonResponse(['errors' => $errors], Response::HTTP_BAD_REQUEST);
        }

        try {
            $user = $this->userService->createUser($userDto);

            return new JsonResponse(ObjectMapper::mapObjectToJson($user->toArray()), Response::HTTP_CREATED);

        } catch (OptimisticLockException|ORMException $e) {

            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("/user/update/{id}", methods={"PUT"})
     */
    public function updateUser(int $id, UserDto $userDto, ValidatorInterface $validation): JsonResponse // /user/delete/2
    {
        $errors = $this->validateObject($userDto, $validation);

        if(!empty($errors)) {

            return new JsonResponse(['errors' => $errors], Response::HTTP_BAD_REQUEST);
        }

        try {
            $user = $this->userService->updateUser($id, $userDto);

            return new JsonResponse(ObjectMapper::mapObjectToJson($user->toArray()), Response::HTTP_CREATED);

        } catch (NotFoundHttpException $exception){

            return new JsonResponse($exception->getMessage(), Response::HTTP_NOT_FOUND);
        } catch (OptimisticLockException|ORMException $e) {

            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/user/delete', methods: ['DELETE'])]
    public function deleteUser(Request $request): JsonResponse
    {

        $id = $request->query->get('id'); // /user/delete?id=2
    }

    /**
     * @Route("/user/tasks", methods={GET})
     */
    public function getUserTasks(Request $request): JsonResponse
    {
        $username = $request->query->get('username'); // /user/tasks?username=2
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