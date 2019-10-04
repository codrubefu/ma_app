<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="clubid", columns={"clubid"})})
 * @ORM\Entity
 */
class Users
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
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=100, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="fname", type="string", length=100, nullable=false)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=100, nullable=false)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=100, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=100, nullable=true)
     */
    private $address;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clubid", referencedColumnName="id")
     * })
     */
    private $clubid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", mappedBy="userid")
     */
    private $eventid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="UserGroups", inversedBy="userid")
     * @ORM\JoinTable(name="user2groups",
     *   joinColumns={
     *     @ORM\JoinColumn(name="userid", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="groupid", referencedColumnName="id")
     *   }
     * )
     */
    private $groupid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eventid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groupid = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return string
     */
    public function getFname(): string
    {
        return $this->fname;
    }

    /**
     * @param string $fname
     */
    public function setFname(string $fname): void
    {
        $this->fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname(): string
    {
        return $this->lname;
    }

    /**
     * @param string $lname
     */
    public function setLname(string $lname): void
    {
        $this->lname = $lname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return Club
     */
    public function getClubid(): Club
    {
        return $this->clubid;
    }

    /**
     * @param Club $clubid
     */
    public function setClubid(Club $clubid): void
    {
        $this->clubid = $clubid;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventid(): \Doctrine\Common\Collections\Collection
    {
        return $this->eventid;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $eventid
     */
    public function setEventid(\Doctrine\Common\Collections\Collection $eventid): void
    {
        $this->eventid = $eventid;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupid(): \Doctrine\Common\Collections\Collection
    {
        return $this->groupid;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $groupid
     */
    public function setGroupid(\Doctrine\Common\Collections\Collection $groupid): void
    {
        $this->groupid = $groupid;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = strtolower($this->getFname()."_".$this->getLname());
    }

}
