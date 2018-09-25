<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Exposable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="card")
 */
class Card
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
     * @var int
     *
     * @ORM\Column(name="userid", type="integer")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $userId;

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
     * @ORM\Column(name="numbers", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $numbers;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $company;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     *
     * @Assert\NotNull()
     *
     * @Exposable
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expireAt", type="datetime")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $expireAt;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $country;

    /**
     * @var float
     *
     * @ORM\Column(name="balance", type="float")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $balance;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $currency;

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
     * @param int $userId
     *
     * @return $this
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string $numbers
     *
     * @return $this
     */
    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    /**
     * @param string $company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @param boolean $isActive
     *
     * @return $this
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @param DateTime $expireAt
     *
     * @return $this
     */
    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;

        return $this;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param float $balance
     *
     * @return $this
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

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
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getNumbers()
    {
        return $this->numbers;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @return DateTime
     */
    public function getExpireAt()
    {

        return $this->expireAt;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @return float
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
