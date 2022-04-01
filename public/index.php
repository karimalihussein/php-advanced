<?php

declare(strict_types = 1);

use App\Enums\Status;
use App\PaymentGetWay\Baddle\Transaction;

require_once __DIR__ . '/../vendor/autoload.php';
$transaction = new Transaction();
// echo transaction::STATUS_PAID;
$transaction->setStatus(Status::PAID);
var_dump($transaction);
// echo transaction::STATUS_PAID;