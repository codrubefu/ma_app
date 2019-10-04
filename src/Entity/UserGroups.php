<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroups
 *
 * @ORM\Table(name="user_groups")
 * @ORM\Entity
 */
class UserGroups
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="groupid")
     */
    private $userid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserid(): \Doctrine\Common\Collections\Collection
    {
        return $this->userid;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $userid
     */
    public function setUserid(\Doctrine\Common\Collections\Collection $userid): void
    {
        $this->userid = $userid;
    }


}
