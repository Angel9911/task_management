<?php declare(strict_types=1);

namespace App\Entity;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table (name = "users")
 */

// * @ORM\Entity (repositoryClass=UserRepository::class)
class User implements PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "bigint")
     */
    private $id;
    /**
     * @ORM\Column(type = "string")
     */
    private $username;
    /**
     * @ORM\Column(type = "string")
     */
    private $password;
    /**
     * @ORM\Column(type = "string")
     */
    private $role;

    /**
     * @ORM\Column(type = "string")
     */
    private string $phone;

    /**
     * @ORM\Column(type = "string")
     */
    private string $email;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="assignedUser", fetch="EXTRA_LAZY")
     */
    private Collection $tasks;

    /**
     */
    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phone = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    /**
     * @return Collection
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
        //return $this->tasks->map(fn(Task $task) => $task->toArrayWithoutUser())->toArray();
    }

    /**
     * @param mixed $tasks
     */
    public function setTasks($tasks): void
    {
        $this->tasks = $tasks;
    }

    public function toArray(): array
    {

        return [
            'id' => $this->id,
            'username' => $this->getUsername(),
            'role' => $this->getRole(),
            'tasks' => $this->getTasks() !== null ? $this->getTasks()->map(fn(Task $task) => $task->toArrayWithoutUser())->toArray() : []
        ];
    }

}