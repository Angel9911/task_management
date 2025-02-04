<?php

namespace App\ScheduleJobs\DeleteFileJob;

use App\ScheduleJobs\Message;

class DeleteMessageJob extends Message
{
    public function __construct()
    {
        parent::__construct("Scheduled file deletion");
    }
}