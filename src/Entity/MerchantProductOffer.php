<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Embeddable;
use WizardsRest\Annotation\Exposable;
use Symfony\Component\Validator\Constraints as Assert;
use WizardsRest\Annotation\Type;

/**
 * @ORM\Table(name="merchant_product_offer")
 * @ORM\Entity(repositoryClass="App\Repository\MerchantProductOfferRepository")
 *
 * @Type("merchantProductOffers")
 */
class MerchantProductOffer
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
     * @ORM\Column(name="description", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="recommended", type="boolean")
     *
     * @Exposable
     */
    private $recommended = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="bundle_type", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $bundleType;

    /**
     * @var string
     *
     * @ORM\Column(name="percent_cost", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $percentCost;

    /**
     * @var string
     *
     * @ORM\Column(name="fixed_fee_amount", type="integer")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $fixedFeeAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="fixed_fee_currency", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $fixedFeeCurrency;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="offers")
     *
     * @Embeddable()
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MerchantProductOfferOption", mappedBy="offer")
     *
     * @Embeddable()
     */
    private $options;

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
     * @return int
     */
    public function getRecommended(): int
    {
        return $this->recommended;
    }

    /**
     * @param int $recommended
     */
    public function setRecommended(int $recommended): void
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
        return $this->bundleType;
    }

    /**
     * @param string $bundleType
     */
    public function setBundleType(string $bundleType): void
    {
        $this->bundleType = $bundleType;
    }

    /**
     * @return string
     */
    public function getPercentCost(): string
    {
        return $this->percentCost;
    }

    /**
     * @param string $percentCost
     */
    public function setPercentCost(string $percentCost): void
    {
        $this->percentCost = $percentCost;
    }

    /**
     * @return string
     */
    public function getFixedFeeAmount(): string
    {
        return $this->fixedFeeAmount;
    }

    /**
     * @param string $fixedFeeAmount
     */
    public function setFixedFeeAmount(string $fixedFeeAmount): void
    {
        $this->fixedFeeAmount = $fixedFeeAmount;
    }

    /**
     * @return string
     */
    public function getFixedFeeCurrency(): string
    {
        return $this->fixedFeeCurrency;
    }

    /**
     * @param string $fixedFeeCurrency
     */
    public function setFixedFeeCurrency(string $fixedFeeCurrency): void
    {
        $this->fixedFeeCurrency = $fixedFeeCurrency;
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

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options): void
    {
        $this->options = $options;
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
}
