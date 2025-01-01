<?php

namespace App\Repository;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T of User
 * @extends ServiceEntityRepository<T>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findUserByUsername($username)
    {
        return $this->findOneBy(['username'=> $username]);
    }

    public function findUserById($id)
    {
        return $this->findOneBy(['id' => $id]);
    }
}