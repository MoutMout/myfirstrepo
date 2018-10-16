<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Embeddable;
use WizardsRest\Annotation\Exposable;
use WizardsRest\Annotation\Type;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 *
 * @Type("users")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Exposable
     */
    private $id;

    /**
     * @ORM\Column(name="firstname", type="string")
     *
     * @Exposable
     */
    private $firstname;

    /**
     * @ORM\Column(name="lastname", type="string")
     *
     * @Exposable
     */
    private $lastname;

    /**
     * @ORM\Column(name="email", type="string")
     *
     * @Exposable
     */
    private $email;

    /**
     * @ORM\Column(name="phone", type="string")
     *
     * @Exposable
     */
    private $phone;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Account")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     *
     * @Embeddable()
     */
    private $account;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserRole", inversedBy="users")
     *
     * @Embeddable()
     */
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Merchant", inversedBy="users", fetch="EAGER")
     *
     * @Embeddable()
     */
    private $merchant;

    /**
     * @ORM\Column(name="created_at", type="integer")
     *
     * @Exposable
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="integer")
     *
     * @Exposable
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Location", inversedBy="users")
     * @ORM\JoinTable(name="users_locations")
     *
     * @Embeddable()
     */
    private $locations = [];

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $firstname
     *
     * @return $this
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @param string $lastname
     *
     * @return $this
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param UserRole $role
     *
     * @return $this
     */
    public function setRole(UserRole $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @param int $merchant
     *
     * @return $this
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * @param int $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(int $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param int $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(int $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return UserRole
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return Merchant
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return Location[]
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * @param Location $location
     *
     * @return $this
     */
    public function setLocation($location)
    {
        $this->locations[] = $location;

        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount(Account $account): void
    {
        $this->account = $account;
    }
}
