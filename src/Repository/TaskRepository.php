<?php

namespace App\Repository;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T of Task
 * @extends ServiceEntityRepository<T>
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function findTasksByUsernameAndStatus(string $username, string $status): array
    {   var_dump($username, $status);
        return $this->createQueryBuilder('t')
            ->join('t.assignedUser', 'u')
            ->join('t.status', 's')
            ->where('u.username = :username')
            ->andWhere('s.status = :status')
            ->setParameter('username', $username)
            ->setParameter('status', $status)
            ->getQuery()
            ->getResult();
    }

    public function findTasksByUsername(string $username): array
    {
        return $this->createQueryBuilder('t')
            ->join('t.assignedUser', 'u')
            ->where('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getResult();
    }

    public function findTasksByStatus(string $status): array
    {
        return $this->createQueryBuilder('t')
            ->join('t.status','s')
            ->where('s.status = :status')
            ->setParameter('status', $status)
            ->getQuery()
            ->getResult();
    }

    public function findAllTasks(): array
    {
        return $this->createQueryBuilder('t')
            ->join('t.assignedUser', 'u')
            ->join('t.status', 's')
            ->getQuery()
            ->getResult();
    }
}