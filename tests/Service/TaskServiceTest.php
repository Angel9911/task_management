<?php

namespace App\Tests\Service;

use App\DTOs\TaskDto;
use App\Entity\Status;
use App\Entity\Task;
use App\Entity\User;
use App\Exceptions\ObjectNotFoundException;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use App\Service\Impl\StatusServiceImpl;
use App\Service\Impl\TaskServiceImpl;
use App\Service\Impl\UserServiceImpl;
use App\Service\StatusService;
use App\Service\TaskService;
use App\Service\UserService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\NotSupported;
use Monolog\Test\TestCase;

class TaskServiceTest extends TestCase
{
    private TaskRepository $taskRepository;
    private StatusService $statusService;
    private TaskService  $taskService;
    private UserService $userService;
    private Task $task;
    private TaskDto $taskDto;
    private User $user;
    private Status $status;
    private EntityManager $entityManager;
    protected function setUp(): void
    {
        $this->taskRepository = $this->createMock(TaskRepository::class);
        $this->entityManager = $this->createMock(EntityManager::class);
        $this->userService = $this->createMock(UserService::class);
        $this->statusService = $this->createMock(StatusService::class);

        $this->taskService = new TaskServiceImpl($this->entityManager, $this->statusService, $this->userService, $this->taskRepository);

        $this->user = $this->generateUser();

        $this->task = $this->generateTask("task1", "task1", $this->user);
        $this->task->setId(1);

        $this->status = $this->generateStatus(1,"Done");
        $this->task->setStatus($this->status);

        $this->taskDto = new TaskDto();

        $this->taskDto->setUsername($this->user->getUsername());
        $this->taskDto->setTitle($this->task->getTitle());
        $this->taskDto->setDescription($this->task->getDescription());
    }

    /**
     * @throws ObjectNotFoundException
     */
    public function testShouldReturnUserTasksByUsernameAndStatusSuccessfully(): void
    {

        $this->taskRepository
            ->expects($this->once())
            ->method('findTasksByUsernameAndStatus')
            ->with($this->user->getUsername(), "Done")
            ->willReturn([$this->task]);

        $actualResult = $this->taskService->getTasksByUsernameAndStatus($this->user->getUsername(), "Done");

        $expectedResult = [
            $this->task->toArray()
        ];

        $this->assertEquals($expectedResult, $actualResult);
        $this->assertCount(count($expectedResult), $actualResult);
    }

    /**
     * @throws ObjectNotFoundException
     */
    public function testShouldReturnAllTasksSuccessfully(): void
    {
        $task2 = $this->generateTask("task2", "task2", $this->user);
        $status2 = $this->generateStatus(2,"ToDo");
        $task2->setStatus($status2);

        $this->taskRepository
            ->expects($this->once())
            ->method('findAllTasks')
            ->willReturn([$this->task, $task2]);

        $actualResult = $this->taskService->getAllTasks();

        $expectedResult = [
            $this->task->toArray(),
            $task2->toArray()
        ];

        $this->assertCount(count($expectedResult), $actualResult);
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @throws NotSupported
     */
    public function testShouldCreateTaskSuccessfully(): void
    {
        $this->userService
            ->expects($this->once())
            ->method('getUserByUsername')
            ->with($this->task->getAssignedUser()->getUsername())
            ->willReturn($this->user);

        $statusTodo = $this->generateStatus(2,"ToDo");
        $this->task->setStatus($statusTodo);

        $this->statusService
            ->expects($this->once())
            ->method('getStatusIdByName')
            ->with($this->task->getStatus()->getStatus())
            ->willReturn($statusTodo);

        $this->entityManager
            ->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf(Task::class));

        $actualResult = $this->taskService->createTask($this->taskDto);

        $this->assertEquals($this->task->getTitle(), $actualResult->getTitle());
        $this->assertEquals($this->task->getDescription(), $actualResult->getDescription());
        $this->assertEquals($this->task->getStatus(), $actualResult->getStatus());
    }

    /**
     * @throws ObjectNotFoundException
     */
    public function testShouldUpdateStatusOfTaskSuccessfully(): void
    {
        $statusTodo = $this->generateStatus(2, "Todo");

        $this->statusService
            ->expects($this->once())
            ->method('getStatusIdByName')
            ->with($statusTodo->getStatus())
            ->willReturn($statusTodo);

        $this->taskRepository
            ->expects($this->once())
            ->method('find')
            ->with(1)
            ->willReturn($this->task);

        $this->entityManager
            ->expects($this->once())
            ->method('getRepository')
            ->with(Task::class)
            ->willReturn($this->taskRepository);

        $this->task->setStatus($statusTodo);

        $this->entityManager
            ->expects($this->once())
            ->method('persist')
            ->with($this->task);

        $this->entityManager
            ->expects($this->once())
            ->method('flush');

        $actualResult = $this->taskService->updateTaskStatus($this->task->getId(), $statusTodo->getStatus());

        $this->assertEquals($this->task->getStatus(), $actualResult->getStatus());
    }
    private function generateUser(): User
    {

        $user = new User();
        $user->setId(1);
        $user->setUsername('user');
        $user->setPassword('testuser');
        $user->setRole('ROLE_USER');
        $user->setEmail('user@gmail.com');
        $user->setPhoneNumber('0123456789');

        return $user;
    }

    private function generateTask(string $title, string $description, User $assignedUser): Task
    {
        return new Task($title,$description, $assignedUser);
    }

    private function generateStatus(int $id, string $status): Status
    {
        $status = new Status($status);
        $status->setId($id);

        return $status;
    }
}