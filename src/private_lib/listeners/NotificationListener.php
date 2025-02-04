<?php

namespace App\private_lib\listeners;

use App\private_lib\events\TaskEvent;

interface NotificationListener
{
    public function onTaskAssigned(TaskEvent $event): void;
}