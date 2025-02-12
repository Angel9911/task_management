<?php

namespace App\Tests\Service;

use App\DTOs\UserDto;
use App\Entity\Task;
use App\Entity\User;
use App\Exceptions\ObjectNotFoundException;
use App\Repository\UserRepository;
use App\Service\Impl\UserServiceImpl;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{

    private $userService;
    private $userRepository;
    private $entityManager;
    private User $user;
    private UserDto $userDto;
    protected function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->entityManager = $this->createMock(EntityManager::class);

        $this->userService = new UserServiceImpl($this->entityManager, $this->userRepository);
        $this->user = $this->generateUser();

        $this->userDto = new UserDto();

        $this->userDto->setUsername($this->user->getUsername());
        $this->userDto->setPassword($this->user->getPassword());
        $this->userDto->setRole($this->user->getRole());
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function testShouldCreateUserSuccessfully(): void
    {
        $this->entityManager
            ->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf(User::class)); // any instance of User instead of checking same object.

        $actualResult = $this->userService->createUser($this->userDto);

        //$this->assertSame($this->user, $actualResult); error because the two variables point to different instances.
        $this->assertEquals($this->user->getUsername(), $actualResult->getUsername());
        $this->assertEquals($this->user->getPassword(), $actualResult->getPassword());
        $this->assertEquals($this->user->getRole(), $actualResult->getRole());
    }

    /**
     * @throws ObjectNotFoundException
     */
    public function testShouldUpdateUserSuccessfully(): void
    {
        $this->userRepository
            ->expects($this->once())
            ->method('findUserById')
            ->with($this->user->getId())
            ->willReturn($this->user);


        $this->entityManager
            ->expects($this->once())
            ->method('flush');

        $this->userDto->setUsername("testupdate");

        $actualResult = $this->userService->updateUser(1,$this->userDto);

        $this->user->setUsername("testupdate");

        $this->assertEquals($this->user->getUsername(), $actualResult->getUsername());
        $this->assertEquals($this->user, $actualResult);
    }

    public function testShouldReturnUserByUsernameSuccessfully(): void
    {
        $this->userRepository
            ->expects($this->once())
            ->method('findUserByUsername')
            ->with($this->user->getUsername())
            ->willReturn($this->user);

        $actualResult = $this->userService->getUserByUsername($this->user->getUsername());

        $this->assertSame($this->user, $actualResult);
        $this->assertEquals($this->user, $actualResult);
    }

    public function testShouldReturnUserByIdSuccessfully(): void
    {
        $this->userRepository
            ->expects($this->once())
            ->method('findUserById')
            ->with($this->user->getId())
            ->willReturn($this->user);

        $actualResult = $this->userService->getUserByUserId($this->user->getId());

        $this->assertSame($this->user, $actualResult);
        $this->assertEquals($this->user, $actualResult);
    }
    private function generateUser(): User
    {

        $user = new User();
        $user->setId(1);
        $user->setUsername('user');
        $user->setPassword('testuser');
        $user->setRole('ROLE_USER');
        //$user->setEmail('user@gmail.com');
        //$user->setPhoneNumber('0123456789');

        return $user;
    }
}