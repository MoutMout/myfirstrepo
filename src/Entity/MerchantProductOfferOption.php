<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="merchant_product_offer_option")
 * @ORM\Entity(repositoryClass="App\Repository\MerchantProductOfferOptionRepository")
 *
 * @ExclusionPolicy("All")
 */
class MerchantProductOfferOption
{
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
     * @ORM\Column(name="percent_cost", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $percent_cost;

    /**
     * @ORM\ManyToOne(targetEntity="MerchantProductOffer", inversedBy="options")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id")
     */
    private $offer;

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
     * @return mixed
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @param mixed $offer
     */
    public function setOffer($offer): void
    {
        $this->offer = $offer;
    }
}
