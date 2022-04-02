<?php

declare(strict_types=1);
namespace App\PaymentGetWay\Baddle;


class Transaction {
   
    private float $amount;
    public function __construct(float $amount){
        $this->amount = $amount;
    }

    // public function getAmount(): float {
    //     return $this->amount;
    // }

    // public function setAmount(float $amount): void {
    //     $this->amount = $amount;
    // }
   

    public function process(){
        echo 'Processing $' . $this->amount . ' transaction';
    }



  
    
}