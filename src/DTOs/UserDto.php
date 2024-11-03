<?php

namespace App\DTOs;

class UserDto
{
    //#[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected ?string $username = null;
    //#[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected ?string $password = null;
    //#[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected ?string $role = null;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}