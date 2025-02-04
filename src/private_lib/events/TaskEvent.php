<?php

namespace App\private_lib\events;

use App\Entity\Task;
use Symfony\Contracts\EventDispatcher\Event;

class TaskEvent extends Event
{
    public const NAME = 'task.assigned';

    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getTask(): Task
    {
        return $this->task;
    }
}