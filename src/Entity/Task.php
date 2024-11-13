<?php declare(strict_types=1);

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table (name = "tasks")
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer")
     */
    private $id;

    /**
     * @ORM\Column(type = "string")
     */
    private $title;
    /**
     * @ORM\Column(type = "string")
     */
    private $description;
    /**
     * @ORM\ManyToOne(targetEntity = "Status", inversedBy = "tasks", fetch="LAZY")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id", nullable = false)
     */
    private ?Status $status = null;
    /**
     * @ORM\ManyToOne(targetEntity = "User", inversedBy = "tasks", fetch="LAZY")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable = false)
     */
    private ?User $assignedUser = null;

    /**
     * @param $title
     * @param $description
     * @param $status
     * @param $assignedUser
     */

    public function __construct($title, $description, $assignedUser)
    {
        $this->title = $title;
        $this->description = $description;
        $this->assignedUser = $assignedUser;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getAssignedUser(): User
    {
        return $this->assignedUser;
    }

    /**
     * @param mixed $assignedUser
     */
    public function setAssignedUser($assignedUser): void
    {
        $this->assignedUser = $assignedUser;
    }

    public function toArray(): array
    {
        return [
          'id' => $this->id,
          'title' => $this->getTitle(),
          'description' => $this->getDescription(),
          'statusId' => $this->getStatus()->getId(),
          'assignedUserId' => $this->getAssignedUser()->getId(),
        ];
    }

    public function toArrayWithoutUser(): array
    {
        return [
          'id' => $this->id,
          'title' => $this->title,
          'description' => $this->description,
          'statusId' => $this->status->getId(),
        ];
    }
}