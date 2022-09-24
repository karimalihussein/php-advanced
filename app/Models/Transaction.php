<?php

declare(strict_types = 1);

namespace App\Models;

class Transaction
{

    private static int $count = 0;

    public function __construct(
        private float $amount,
        private string $description,
    )
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->status = Status::PENDING;
        self::$count++;
    }

    public function addTax(float $tax) : Transaction
    {
       $this->amount += $this->amount * $tax / 100;
        return $this;
    }

    public function applyDiscount(float $discount) : Transaction
    {
         $this->amount -= $this->amount * $discount / 100;
         return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setStatus(string $status): self
    {
        if (!in_array($status, Status::STATUSES)) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->status = $status;
        return $this;
    }

    public static function getCount(): int
    {
        return self::$count;
    }

    public function process()
    {
        echo 'Processing transaction';
    }

    public function __destruct()
    {
        // echo "Transaction {$this->description} is complete. Amount: {$this->amount}";
    }
}