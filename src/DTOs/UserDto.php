<?php declare(strict_types=1);

namespace App\DTOs;

use Symfony\Component\Validator\Constraints as Assert;

class UserDto
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected string $username;
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected string $password;
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected string $role;

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