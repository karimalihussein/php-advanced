<?php

declare(strict_types = 1);



require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new App\Invoice();
// App\Invoice::process(1,2,3);
$invoice->process(15,'karim ali hussein');
// var_dump(isset($invoice->amount));
// var_dump($invoice);
// echo $invoice->amount . PHP_EOL;
// $invoice->karim = 'ahmed';
// echo $invoice->karim . PHP_EOL;


