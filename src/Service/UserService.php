<?php

namespace App\Service;

use App\DTOs\UserDto;
use App\Entity\User;

interface UserService
{
    public function createUser(UserDto $user): User;
    public function updateUser($userId, UserDto $userDto): User;
    public function deleteUser($userId): bool;
    public function getUserIdByUsername($username): User;
    public function getUserByUserId($id): User|null;
}