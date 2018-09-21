<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraints as Assert;
use \DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="transaction")
 *
 * @ExclusionPolicy("All")
 */
class Transaction
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
     * @var int
     *
     * @ORM\Column(name="card_id", type="integer")
     *
     * @ORM\OneToOne(
     *     targetEntity="App\Entity\Card",
     * )
     *
     * @Expose
     */
    private $card;

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
     * @var bool
     *
     * @ORM\Column(name="isCredit", type="boolean")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $isCredit;

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
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     *
     * @Assert\NotBlank()
     *
     * @Expose
     */
    private $value;

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
     * @param int $card
     *
     * @return $this
     */
    public function setCard(int $card)
    {
        $this->card = $card;

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
     * @param boolean $isCredit
     *
     * @return $this
     */
    public function setIsCredit($isCredit)
    {
        $this->isCredit = $isCredit;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param DateTime $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

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
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return boolean
     */
    public function getIsCredit()
    {
        return $this->isCredit;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {

        return $this->date;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }
}
