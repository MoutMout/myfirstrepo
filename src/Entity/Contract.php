<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Embeddable;
use WizardsRest\Annotation\Exposable;
use Symfony\Component\Validator\Constraints as Assert;
use WizardsRest\Annotation\Type;

/**
 * @ORM\Entity
 * @ORM\Table(name="contract")
 *
 * @Type("contracts")
 */
class Contract
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
     * @ORM\OneToOne(targetEntity="App\Entity\Merchant", inversedBy="contract")
     * @ORM\JoinColumn(name="merchant_id", referencedColumnName="id")
     *
     * @Embeddable()
     */
    private $merchant;

    /**
     * @var ContractDetails[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ContractDetails", mappedBy="contract")
     *
     * @Embeddable()
     */
    private $contractDetails = [];

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="therms_conditions_file", type="string")
     *
     * @Exposable
     */
    private $thermsConditionsFile;

    /**
     * @var string
     *
     * @ORM\Column(name="power_attorney_file", type="string")
     *
     * @Exposable
     */
    private $powerAttorneyFile;

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
     * @return string
     */
    public function getPowerAttorneyFile(): string
    {
        return $this->powerAttorneyFile;
    }

    /**
     * @param string $powerAttorneyFile
     */
    public function setPowerAttorneyFile(string $powerAttorneyFile): void
    {
        $this->powerAttorneyFile = $powerAttorneyFile;
    }

    /**
     * @param Merchant $merchant
     *
     * @return $this
     */
    public function setMerchant(Merchant $merchant)
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * @param string $file
     *
     * @return $this
     */
    public function setFile(string $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return int
     */
    public function getMerchant()
    {
        return $this->merchant;
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
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return ContractDetails[]
     */
    public function getContractDetails()
    {
        return $this->contractDetails;
    }

    /**
     * @param ContractDetails[] $contractDetails
     */
    public function setContractDetails($contractDetails): void
    {
        $this->contractDetails = $contractDetails;
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
     * @return string
     */
    public function getThermsConditionsFile(): string
    {
        return $this->thermsConditionsFile;
    }

    /**
     * @param string $thermsConditionsFile
     */
    public function setThermsConditionsFile(string $thermsConditionsFile): void
    {
        $this->thermsConditionsFile = $thermsConditionsFile;
    }
}
