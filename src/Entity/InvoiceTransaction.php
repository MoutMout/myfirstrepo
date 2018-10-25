<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Embeddable;
use WizardsRest\Annotation\Exposable;
use WizardsRest\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoice_transaction")
 *
 * @Type("invoice-transactions")
 */
class InvoiceTransaction
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
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $amount;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Invoice", inversedBy="transactions", fetch="EAGER")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id", nullable=false)
     *
     * @Embeddable()
     */
    private $invoice;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="transactions", fetch="EAGER")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     *
     * @Embeddable()
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
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     *
     * @return InvoiceTransaction
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
     * @return InvoiceTransaction
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

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
     * @return InvoiceTransaction
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return Invoice
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     *
     * @return InvoiceTransaction
     */
    public function setInvoice(Invoice $invoice): self
    {
        $invoice->setTransaction($this);
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     *
     * @return InvoiceTransaction
     */
    public function setProduct(Product $product): self
    {
        $product->setTransaction($this);
        $this->product = $product;

        return $this;
    }
}
