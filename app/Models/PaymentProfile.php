<?php

namespace App\Models;

class PaymentProfile
{
    public int $id;

    public function __construct()
    {
        $this->id = rand();
    }
}