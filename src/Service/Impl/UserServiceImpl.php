<?php

namespace App\Service\Impl;

use App\DTOs\UserDto;
use App\Entity\User;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserServiceImpl implements UserService
{
    private EntityManagerInterface $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function createUser(UserDto $user): User
    {
        $user = new User();

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

    public function getUserIdByUsername($username): User
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['username' => $username]);
    }

    public function getUserByUserId($id): User|null
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['id' => $id]);
    }

    /**
     * @param $userId
     * @param UserDto $userDto
     * @throws NotFoundHttpException
     * @return User
     */
    public function updateUser($userId, UserDto $userDto): User
    {
        $updateUser = $this->getUserByUserId($userId);

        if(!$updateUser) {

            throw new NotFoundHttpException("user not found");
        }

        if($userDto->getUsername() != null){

            $updateUser->setUsername($userDto->getUsername());
        }
        if($userDto->getPassword() != null){

            $updateUser->setPassword($userDto->getPassword());
        }
        if($userDto->getRole() != null){

            $updateUser->setRole($userDto->getRole());
        }

        $this->entityManager->persist($updateUser);
        $this->entityManager->flush();

        return $updateUser;
    }

    public function deleteUser($userId): bool
    {

    }
}