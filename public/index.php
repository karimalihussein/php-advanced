<?php

declare(strict_types = 1);

use App\Enums\Status;
use App\PaymentGetWay\Baddle\Transaction;

require_once __DIR__ . '/../vendor/autoload.php';
$transaction = new Transaction(25);
// $transaction->setAmount(125);
$transaction->process();
