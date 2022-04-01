<?php

declare(strict_types=1);
namespace App\PaymentGetWay\Baddle;


class Transaction {

  

    public function __construct(
        public float $amount,
        public string $status
    ){
       
    }

    public function prrcess(){
        echo "Processing transaction....";
    }



  
    
}