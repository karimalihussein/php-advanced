<?php

declare(strict_types = 1);

namespace App\Entity;

use App\Enums\InvoiceStatus;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;


/**
 * @ORM\Entity
 * @ORM\Table(name="invoice_items")
 */
class InvoiceItems
{
    #[Id]
    #[Column(type: GeneratedValue::class)]
    private int $id;
    #[Column(name: 'invoice_id')]
    private int $invoiceId;
    #[Column]
    private string $description;
    
    #[Column]
    private int $quantity;

    #[Column(name: 'unit_pirce',type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $unitPrice;
    // #[ManyToOne(targetEntity: Invoice::class)]
    #[ManyToOne(inversedBy: "items")]
    private Invoice $invoice;

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(int $invoiceId): self
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }


}