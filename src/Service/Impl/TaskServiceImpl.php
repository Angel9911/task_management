<?php

namespace App\Service\Impl;

use App\DTOs\TaskDto;
use App\Entity\Task;
use App\Exceptions\ObjectNotFoundException;
use App\Repository\TaskRepository;
use App\Service\StatusService;
use App\Service\TaskService;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\NotSupported;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskServiceImpl implements TaskService
{
    private EntityManagerInterface $entityManager;

    private TaskRepository $taskRepository;

    private StatusService $statusService;

    private UserService $userService;

    private const newCreatedTask = 'ToDo';

    public function __construct(EntityManagerInterface $entityManager
        , StatusService $statusService
        , UserService $userService
        , TaskRepository $taskRepository){

        $this->entityManager = $entityManager;

        $this->statusService = $statusService;

        $this->userService = $userService;

        $this->taskRepository = $taskRepository;
    }

    public function getTaskById(int $id): Task|null
    {
        return $this->entityManager->getRepository(Task::class)->find($id);
    }
    /**
     * @throws NotSupported
     */
    public function createTask(TaskDto $taskDto): Task
    {
        $assignedUser = $this->userService->getUserByUsername($taskDto->getUsername());

        $task = new Task($taskDto->getTitle(), $taskDto->getDescription(), $assignedUser);

        $status = $this->statusService->getStatusIdByName(self::newCreatedTask);

        $task->setStatus($status);

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return $task;
    }

    /**
     * @param $id
     * @param string $status
     * @return Task
     * @throws ObjectNotFoundException
     */
    public function updateTaskStatus($id, string $status): Task
    {
        $status = $this->statusService->getStatusIdByName($status);

        if(!$status){

            throw new ObjectNotFoundException('Status');
        }

        $task = $this->getTaskById($id);

        if(!$task){

            throw new ObjectNotFoundException('Task');
        }

        $task->setStatus($status);

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return $task;
    }

    /**
     * @throws ObjectNotFoundException
     */
    public function deleteTask($id): bool
    {
        $deleteTask = $this->getTaskById($id);

        if(!$deleteTask){

            throw new ObjectNotFoundException('Task');
        }

        $this->entityManager->remove($deleteTask);

        $this->entityManager->flush();

        return true;
    }

    /**
     * @param string $username
     * @param string $status
     * @return array
     * @throws ObjectNotFoundException
     */
    public function getTasksByUsernameAndStatus(string $username, string $status): array
    {
        $getTasks = $this->taskRepository->findTasksByUsernameAndStatus($username, $status);

        if(empty($getTasks)){

            throw new ObjectNotFoundException('Not found any tasks');
        }

        return array_map(fn(Task $task) => $task->toArray(), $getTasks);
    }


    /**
     * @throws ObjectNotFoundException
     */
    public function getAllTasks(): array
    {
        $getAllTasks = $this->taskRepository->findAllTasks();

        if(empty($getAllTasks)){

            throw new ObjectNotFoundException('Not found any tasks');
        }

        return array_map(fn(Task $task) => $task->toArray(), $getAllTasks);
    }

    /**
     * @throws ObjectNotFoundException
     */
    public function getTasksByUsername(string $username): array
    {
        $getAllTasksByUsername = $this->taskRepository->findTasksByUsername($username);

        if(empty($getAllTasksByUsername)){

            throw new ObjectNotFoundException('Not found any tasks');
        }

        return array_map(fn(Task $task) => $task->toArray(), $getAllTasksByUsername);
    }
}