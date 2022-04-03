<?php

declare(strict_types = 1);



require_once __DIR__ . '/../vendor/autoload.php';

$service = new \App\DebtCollectionService();

echo $service->collectDebt(new \App\Rocky()) . PHP_EOL;


