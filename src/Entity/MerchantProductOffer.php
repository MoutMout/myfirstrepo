<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="merchant_product_offer")
 * @ORM\Entity(repositoryClass="App\Repository\MerchantProductOfferRepository")
 *
 * @ExclusionPolicy("All")
 */
class MerchantProductOffer
{
    public function __construct() {
        $this->options = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="recommended", type="boolean")
     *
     * @Expose
     */
    private $recommended = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="bundle_type", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $bundle_type;

    /**
     * @var string
     *
     * @ORM\Column(name="percent_cost", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $percent_cost;

    /**
     * @var string
     *
     * @ORM\Column(name="fixed_fee_amount", type="integer")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $fixed_fee_amount;

    /**
     * @var string
     *
     * @ORM\Column(name="fixed_fee_currency", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $fixed_fee_currency;

    /**
     * @ORM\OneToMany(targetEntity="MerchantProductOfferOption", mappedBy="offer")
     */
    private $options;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="merchantOffers")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function getRecommended(): bool
    {
        return $this->recommended;
    }

    /**
     * @param bool $recommended
     */
    public function setRecommended(bool $recommended): void
    {
        $this->recommended = $recommended;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getBundleType(): string
    {
        return $this->bundle_type;
    }

    /**
     * @param string $bundle_type
     */
    public function setBundleType(string $bundle_type): void
    {
        $this->bundle_type = $bundle_type;
    }

    /**
     * @return string
     */
    public function getPercentCost(): string
    {
        return $this->percent_cost;
    }

    /**
     * @param string $percent_cost
     */
    public function setPercentCost(string $percent_cost): void
    {
        $this->percent_cost = $percent_cost;
    }

    /**
     * @return string
     */
    public function getFixedFeeAmount(): string
    {
        return $this->fixed_fee_amount;
    }

    /**
     * @param string $fixed_fee_amount
     */
    public function setFixedFeeAmount(string $fixed_fee_amount): void
    {
        $this->fixed_fee_amount = $fixed_fee_amount;
    }

    /**
     * @return string
     */
    public function getFixedFeeCurrency(): string
    {
        return $this->fixed_fee_currency;
    }

    /**
     * @param string $fixed_fee_currency
     */
    public function setFixedFeeCurrency(string $fixed_fee_currency): void
    {
        $this->fixed_fee_currency = $fixed_fee_currency;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product): void
    {
        $this->product = $product;
    }
}
