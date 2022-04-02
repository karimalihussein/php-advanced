<?php

declare(strict_types = 1);

use App\Enums\Status;
use App\PaymentGetWay\Baddle\Transaction;

require_once __DIR__ . '/../vendor/autoload.php';
$transaction = new Transaction(25);
$transaction->copyFrom(new Transaction(100));

// $reflectionProperty = New ReflectionProperty(Transaction::class, 'amount');  
// $reflectionProperty->setAccessible(true);
// $reflectionProperty->setValue($transaction, 125); 
// var_dump($reflectionProperty->getValue($transaction));
// $transaction->amount;
// $transaction->setAmount(125);
// $transaction->process();
