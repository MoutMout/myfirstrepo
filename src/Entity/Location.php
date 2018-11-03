<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Exposable;
use Symfony\Component\Validator\Constraints as Assert;
use WizardsRest\Annotation\Type;
use WizardsRest\Annotation\Embeddable;

/**
 * @ORM\Entity
 * @ORM\Table(name="location")
 *
 * @Type("locations")
 */
class Location
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
     * @ORM\Column(name="name", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $name;

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
     * @ORM\Column(name="postal_code", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="house_number", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $houseNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number_bis", type="string", nullable=true)
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $phoneNumberBis;

    /**
     * @var int
     *
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @Exposable
     */
    private $wifi;

    /**
     * @ORM\Column(name="created_at", type="integer")
     *
     * @Exposable
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="integer", nullable=true)
     *
     * @Exposable
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activity")
     *
     * @Embeddable()
     */
    private $activity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activity")
     *
     * @Embeddable()
     */
    private $bisActivity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activity")
     *
     * @Embeddable()
     */
    private $terActivity;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="locations")
     * @ORM\JoinTable(name="users_locations")
     *
     * @Embeddable()
     */
    private $users = [];

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", mappedBy="products")
     * @ORM\JoinTable(name="products_locations")
     *
     * @Embeddable()
     */
    private $products = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Merchant", inversedBy="locations")
     *
     * @Embeddable()
     */
    private $merchant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pos", mappedBy="location")
     *
     * @Embeddable()
     */
    private $poss = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Invoice", mappedBy="location")
     *
     * @Embeddable()
     */
    private $invoices = [];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Location
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return Location
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     *
     * @return Location
     */
    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocality(): ?string
    {
        return $this->locality;
    }

    /**
     * @param string $locality
     *
     * @return Location
     */
    public function setLocality(string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    /**
     * @param string $houseNumber
     *
     * @return Location
     */
    public function setHouseNumber(string $houseNumber): self
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param null|string $website
     *
     * @return Location
     */
    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Location
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return Location
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhoneNumberBis(): ?string
    {
        return $this->phoneNumberBis;
    }

    /**
     * @param null|string $phoneNumberBis
     *
     * @return Location
     */
    public function setPhoneNumberBis(?string $phoneNumberBis): self
    {
        $this->phoneNumberBis = $phoneNumberBis;

        return $this;
    }

    /**
     * @return Activity
     */
    public function getActivity(): Activity
    {
        return $this->activity;
    }

    /**
     * @param Activity $activity
     *
     * @return Location
     */
    public function setActivity(Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * @return Activity|null
     */
    public function getBisActivity(): ?Activity
    {
        return $this->bisActivity;
    }

    /**
     * @param Activity|null $bisActivity
     *
     * @return Location
     */
    public function setBisActivity(?Activity $bisActivity): self
    {
        $this->bisActivity = $bisActivity;

        return $this;
    }

    /**
     * @return Activity|null
     */
    public function getTerActivity(): ?Activity
    {
        return $this->terActivity;
    }

    /**
     * @param Activity|null $terActivity
     *
     * @return Location
     */
    public function setTerActivity(?Activity $terActivity): self
    {
        $this->terActivity = $terActivity;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getWifi(): ?bool
    {
        return $this->wifi;
    }

    /**
     * @param bool|null $wifi
     *
     * @return Location
     */
    public function setWifi(?bool $wifi): self
    {
        $this->wifi = $wifi;

        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $product
     *
     * @return Location
     */
    public function setProduct(Product $product): self
    {
        $product->setLocation($this);
        $this->products[] = $product;

        return $this;
    }

    /**
     * @return User[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User $user
     *
     * @return Location
     */
    public function setUser(User $user): self
    {
        $user->setLocation($this);
        $this->users[] = $user;

        return $this;
    }

    /**
     * @return Pos[]
     */
    public function getPoss()
    {
        return $this->poss;
    }

    /**
     * @param Pos $pos
     *
     * @return Location
     */
    public function setPos(Pos $pos): self
    {
        $pos->setLocation($this);
        $this->poss[] = $pos;

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
     *
     * @return Location
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
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
     *
     * @return Location
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant
    {
        return $this->merchant;
    }

    /**
     * @param Merchant $merchant
     *
     * @return Location
     */
    public function setMerchant(Merchant $merchant): self
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * @return Invoice[]
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * @param Invoice $invoice
     *
     * @return Location
     */
    public function setInvoice(Invoice $invoice): self
    {
        $invoice->setLocation($this);
        $this->invoices[] = $invoice;

        return $this;
    }
}
