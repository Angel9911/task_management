<?php

namespace App\Service\Impl;

use App\Entity\Status;
use App\Service\StatusService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\NotSupported;

class StatusServiceImpl implements StatusService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @throws NotSupported
     */
    public function getStatusIdByName(string $name): Status|null
    {
        return $this->entityManager->getRepository(Status::class)->findOneBy(['status' => $name]);
    }

    public function getStatusById(int $id): Status
    {
        return $this->entityManager->getRepository(Status::class)->findOneBy(['id' => $id]);
    }
}