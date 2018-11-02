<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Embeddable;
use WizardsRest\Annotation\Exposable;
use WizardsRest\Annotation\Type;

/**
 * @ORM\Entity
 * @ORM\Table(name="contract_details")
 *
 * @Type("contract_details")
 */
class ContractDetails
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Contract", inversedBy="contractDetails")
     * @ORM\JoinColumn(name="contract_id", referencedColumnName="id")
     *
     * @Embeddable()
     */
    private $contract;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     *
     * @Embeddable()
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MerchantProductOffer")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id", nullable=false)
     *
     * @Embeddable()
     */
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MerchantProductOfferOption")
     * @ORM\JoinColumn(name="option_id", referencedColumnName="id", nullable=false)
     *
     * @Embeddable()
     */
    private $option;

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
     * @ORM\Column(name="deleted_at", type="integer", nullable=true)
     *
     * @Exposable
     */
    private $deletedAt;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Product
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
 * @return MerchantProductOffer
 */
    public function getOffer(): ?MerchantProductOffer
    {
        return $this->offer;
    }

    /**
     * @param MerchantProductOffer $offer
     */
    public function setOffer(MerchantProductOffer $offer): void
    {
        $this->offer = $offer;
    }

    /**
     * @return MerchantProductOfferOption
     */
    public function getOption(): ?MerchantProductOfferOption
    {
        return $this->option;
    }

    /**
     * @param MerchantProductOfferOption $option
     */
    public function setOption(MerchantProductOfferOption $option): void
    {
        $this->option = $option;
    }

    /**
     * @param Contract $contract
     */
    public function setContract(Contract $contract): void
    {
        $this->contract = $contract;
    }

    /**
     * @return Contract
     */
    public function getContract(): ?Contract
    {
        return $this->contract;
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
     * @return int
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param int $createdAt
     */
    public function setCreatedAt(int $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param int $updatedAt
     */
    public function setUpdatedAt(int $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param int $deletedAt
     */
    public function setDeletedAt(int $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}
