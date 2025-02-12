<?php

namespace App\Tests\Service\integration_tests;

use App\DTOs\UserDto;
use App\Service\UserService;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserServiceTest extends KernelTestCase
{
    private ?UserService $userService;
    private ?EntityManagerInterface $entityManager;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        self::bootKernel();

        $this->userService = static::getContainer()->get(UserService::class);
        $this->entityManager = static::getContainer()->get(EntityManagerInterface::class);

        $this->resetDatabase();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();

        $this->entityManager = null;
    }


    /**
     * Reset database before each test
     * @return void
     * @throws Exception
     */
    private function resetDatabase(): void
    {
        $connection = $this->entityManager->getConnection();
        $connectionManager = $connection->createSchemaManager();

        $database = $connection->getDatabase();

        $connectionManager->dropDatabase($database);
        $connectionManager->createDatabase($database);
    }

    public function testShouldCreateUserSuccessfully(): void
    {
        $userDto = new UserDto();
        $userDto->setUsername("testuser");
        $userDto->setPassword("testpassword");
        $userDto->setRole("ROLE_USER");

        $user = $this->userService->createUser($userDto);

    }
}