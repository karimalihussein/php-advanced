<?php

declare(strict_types=1);
namespace App\PaymentGetWay\Baddle;


class Transaction {
   
    public float $amount;
    public function __construct(float $amount){
        $this->amount = $amount;
    }

    public function process(){
        echo 'Processing $' . $this->amount . ' transaction';
        $this->generateReceipt();
        $this->sendEmail();
    }



    public function copyFrom(Transaction $transaction){
        var_dump($transaction->amount, $this->sendEmail());
    }

    private function generateReceipt(){

    }

    private function sendEmail(){
        return true;

    }



  
    
}