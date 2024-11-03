<?php

namespace App\Service;

use App\Entity\Status;

interface StatusService
{
    public function getStatusIdByName(string $name): Status|null;
    public function getStatusById(int $id): Status;
}