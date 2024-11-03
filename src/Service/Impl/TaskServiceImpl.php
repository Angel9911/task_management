<?php

namespace App\Service\Impl;

use App\DTOs\TaskDto;
use App\Entity\Task;
use App\Service\StatusService;
use App\Service\TaskService;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\NotSupported;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskServiceImpl implements TaskService
{
    private EntityManagerInterface $entityManager;

    private StatusService $statusService;

    private UserService $userService;

    private const newCreatedTask = 'To Do';

    public function __construct(EntityManagerInterface $entityManager, StatusService $statusService, UserService $userService){

        $this->entityManager = $entityManager;

        $this->statusService = $statusService;

        $this->userService = $userService;
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
        $assignedUser = $this->userService->getUserIdByUsername($taskDto->getUsername());

        $task = new Task($taskDto->getTitle(), $taskDto->getDescription(), $assignedUser);

        $status = $this->statusService->getStatusIdByName(self::newCreatedTask);

        $task->setStatus($status);

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return $task;
    }

    /**
     * @throws NotFoundHttpException
     * @throws NotSupported
     * @return Task
     */
    public function updateTaskStatus($id, string $status): Task
    {
        $status = $this->statusService->getStatusIdByName($status);

        if(!$status){

            throw new NotFoundHttpException('Status Not Found');
        }

        $task = $this->getTaskById($id);

        if(!$task){

            throw new NotFoundHttpException('Task Not Found');
        }

        $task->setStatus($status);

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return $task;
    }

    public function deleteTask($id): bool
    {

    }
}