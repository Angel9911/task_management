<?php declare(strict_types=1);

namespace App\Service\Impl;

use App\DTOs\UserDto;
use App\Entity\User;
use App\Exceptions\ObjectNotFoundException;
use App\Repository\UserRepository;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserServiceImpl implements UserService
{
    private EntityManagerInterface $entityManager;

    private UserRepository $userRepository;

    public function __construct(EntityManagerInterface $entityManager
    , UserRepository $userRepository)
    {
        $this->entityManager = $entityManager;

        $this->userRepository = $userRepository;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function createUser(UserDto $userDto): User
    {
        $newUser = new User();

        $createdUser = $this->mapDtoToEntity($newUser, $userDto);

        $this->entityManager->persist($createdUser);
        $this->entityManager->flush();

        return $createdUser;
    }

    public function getUserByUsername($username): User
    {
        return $this->userRepository->findUserByUsername($username);
    }

    public function getUserByUserId($id): User|null
    {
        return $this->userRepository->findUserById($id);
    }

    /**
     * @param $userId
     * @param UserDto $userDto
     * @return User
     * @throws ObjectNotFoundException
     */
    public function updateUser($userId, UserDto $userDto): User
    {
        $updateUser = $this->getUserByUserId($userId);

        if(!$updateUser) {

            throw new ObjectNotFoundException("User");
        }

        $this->mapDtoToEntity($updateUser, $userDto);

        // No need to call persist, as the entity is already managed by Doctrine
        $this->entityManager->flush();

        return $updateUser;
    }

    /**
     * @throws ObjectNotFoundException
     */
    public function deleteUser(User $user): bool
    {
        $this->entityManager->remove($user);

        $this->entityManager->flush();

        return true;
    }

    /**
     * @param UserDto $userDto
     * @param User $user
     * @return User
     */
    public function mapDtoToEntity(User $user, UserDto $userDto): User
    {

        if ($userDto->getUsername() != null) {
            $user->setUsername($userDto->getUsername());
        }
        if ($userDto->getPassword() != null) {
            $user->setPassword($userDto->getPassword());
        }
        if ($userDto->getRole() != null) {
            $user->setRole($userDto->getRole());
        }

        return $user;
    }
}