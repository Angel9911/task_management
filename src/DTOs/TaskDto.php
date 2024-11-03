<?php

namespace App\DTOs;

use Symfony\Component\Validator\Constraints as Assert;

class TaskDto
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected string $title;
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected string $description;
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 100)]
    protected string $username;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}