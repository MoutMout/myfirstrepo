<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Embeddable;
use WizardsRest\Annotation\Exposable;
use Symfony\Component\Validator\Constraints as Assert;
use WizardsRest\Annotation\Type;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoice")
 *
 * @Type("invoices")
 */
class Invoice
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Exposable
     */
    private $id;

    /**
     * @ORM\Column(name="issue_date", type="datetime")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $issueDate;

    /**
     * @ORM\Column(name="due_date",type="datetime")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $dueDate;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $amount;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Location")
     *
     * @Embeddable()
     */
    private $location;

    /**
     * @ORM\Column(name="nb_voucher_purchases", type="integer")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $nbVoucherPurchases;

    /**
     * @ORM\Column(name="nb_card_purchases", type="integer")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $nbCardPurchases;

    /**
     * @ORM\Column(name="currency", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $currency;

    /**
     * @ORM\Column(name="nb_shipments", type="integer", nullable=true)
     *
     * @Exposable
     */
    private $nbShipments;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface $issueDate
     *
     * @return Invoice
     */
    public function setIssueDate(\DateTimeInterface $issueDate): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDueDate(): \DateTimeInterface
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTimeInterface $dueDate
     *
     * @return Invoice
     */
    public function setDueDate(\DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return Invoice
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return Invoice
     */
    public function setLocation(Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return int
     */
    public function getNbVoucherPurchases(): int
    {
        return $this->nbVoucherPurchases;
    }

    /**
     * @param int $nbVoucherPurchases
     *
     * @return Invoice
     */
    public function setNbVoucherPurchases(int $nbVoucherPurchases): self
    {
        $this->nbVoucherPurchases = $nbVoucherPurchases;

        return $this;
    }

    /**
     * @return int
     */
    public function getNbCardPurchases(): int
    {
        return $this->nbCardPurchases;
    }

    /**
     * @param int $nbCardPurchases
     *
     * @return Invoice
     */
    public function setNbCardPurchases(int $nbCardPurchases): self
    {
        $this->nbCardPurchases = $nbCardPurchases;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return Invoice
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbShipments(): ?int
    {
        return $this->nbShipments;
    }

    /**
     * @param int|null $nbShipments
     *
     * @return Invoice
     */
    public function setNbShipments(?int $nbShipments): self
    {
        $this->nbShipments = $nbShipments;

        return $this;
    }
}
