<?php

namespace App\Service;

use App\DTOs\TaskDto;
use App\Entity\Task;

interface TaskService
{
    public function getTaskById(int $id): Task|null;
    public function createTask(TaskDto $taskDto): Task;
    public function updateTaskStatus($id, string $status): Task;
    public function getTasksByUsernameAndStatus(string $username, string $status): array;
    public function deleteTask($id): bool;
}