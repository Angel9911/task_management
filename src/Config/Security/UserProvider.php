<?php

namespace App\Config\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private $userRepository;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        $this->userRepository = $this->entityManager->getRepository(User::class);
    }

    /**
     * @throws \Exception
     */
    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof AuthenticateUser) {
            throw new UnsupportedUserException();
        }


        return $this->loadUserByIdentifier($user->getUserIdentifier());
    }

    public function supportsClass(string $class): bool
    {
        return AuthenticateUser::class === $class;
    }

    /**
     * @throws \Exception
     */
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $user = $this->userRepository->findOneBy(['username' => $identifier]);

        if (!$user) {
            throw new \Exception('User not found');
        }

        // Map the User entity to the SecurityUser class
        return new AuthenticateUser(
            $user->getUsername(),
            $user->getPassword(),
            (array)$user->getRole() // Ensure your User entity provides roles or derive them here
        );
    }
}