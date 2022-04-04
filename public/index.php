<?php

declare(strict_types = 1);



require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new App\Invoice();
$invoice->amount = 15; 
var_dump(isset($invoice->amount));
// var_dump($invoice);
// echo $invoice->amount . PHP_EOL;
// $invoice->karim = 'ahmed';
// echo $invoice->karim . PHP_EOL;


