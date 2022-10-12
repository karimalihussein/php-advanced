<?php

declare(strict_types = 1);

namespace App\Services;

use App\Interfaces\PaymentGatewayServiceInterface;

class PaddlePaymentService implements PaymentGatewayServiceInterface
{
    public function charge(array $customer, float $amount, float $tax): bool
    {
        echo 'Charging From Paddle Payment Service <br>';
        return true;
    }
}
