<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name = "users")
 */
class User
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
     * @ORM\OneToMany(targetEntity="Task", mappedBy="assignedUser")
     */
    private $tasks;

    /**
     */
    public function __construct()
    {
        /*$this->username = $username;
        $this->password = $password;
        $this->role = $role;*/
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
    public function getPassword()
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
     * @return mixed
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param mixed $tasks
     */
    public function setTasks($tasks): void
    {
        $this->tasks = $tasks;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->getUsername(),
            'role' => $this->getRole(),
            'tasks' => array_map(fn($task) => $task->toArray(), $this->getTasks()->toArray())
        ];
    }
}