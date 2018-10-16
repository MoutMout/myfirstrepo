<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Embeddable;
use WizardsRest\Annotation\Exposable;
use Symfony\Component\Validator\Constraints as Assert;
use WizardsRest\Annotation\Type;

/**
 * @ORM\Entity
 * @ORM\Table(name="merchant")
 *
 * @Type("merchants")
 */
class Merchant
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
     * @var string
     *
     * @ORM\Column(name="companyId", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $companyId;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $postalCode;

    /**
     * @var int
     *
     * @ORM\Column(name="VATnumber", type="integer")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $VATnumber;

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
     * @var Organisation
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Organisation", inversedBy="merchants")
     *
     * @Embeddable()
     */
    private $organisation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Location", mappedBy="merchant", fetch="EAGER")
     *
     * @Embeddable()
     */
    private $locations = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="merchant", fetch="EAGER")
     *
     * @Embeddable()
     */
    private $users = [];

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Contract", mappedBy="merchant")
     *
     * @Embeddable()
     */
    private $contract;

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $organisation
     *
     * @return $this
     */
    public function setOrganisation(Organisation $organisation)
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * @param string $companyId
     *
     * @return $this
     */
    public function setCompanyId(string $companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @param string $address
     *
     * @return $this
     */
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param string $postalCode
     *
     * @return $this
     */
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param int $VATnumber
     *
     * @return $this
     */
    public function setVATnumber(int $VATnumber)
    {
        $this->VATnumber = $VATnumber;

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
     * @return Organisation
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return int
     */
    public function getVATnumber()
    {
        return $this->VATnumber;
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
     * @return Merchant
     */
    public function setLocation(Location $location): self
    {
        $location->setMerchant($this);
        $this->locations[] = $location;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     */
    public function setCreatedAt(int $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     */
    public function setUpdatedAt(int $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User $user
     *
     * @return Merchant
     */
    public function setUser(User $user): self
    {
        $user->setMerchant($this);
        $this->users[] = $user;

        return $this;
    }

    /**
     * @return Contract
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param Contract $contract
     */
    public function setContract(Contract $contract): void
    {
        $this->contract = $contract;
    }
}
