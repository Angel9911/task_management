<?php

namespace App\Config\Security;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticateUser implements UserInterface, PasswordAuthenticatedUserInterface
{

    private string $username;
    private string $password;

    private array $roles;
    public function __construct($username, $password, $roles)
    {
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;

    }

    public function getRoles(): array
    {
       return $this->roles;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}