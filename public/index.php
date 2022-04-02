<?php

declare(strict_types = 1);

USE App\ToasterPro;
USE App\Toaster;

require_once __DIR__ . '/../vendor/autoload.php';

$toaster = new ToasterPro();
$toaster->addSlices(slice:'bread');
$toaster->addSlices('bread');
$toaster->addSlices('bread');


// $toaster->foo();
// 
foo($toaster);
function foo(Toaster $toaster){
  $toaster->toast();

}

