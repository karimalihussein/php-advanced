<?php

declare(strict_types=1);
namespace App\PaymentGetWay\Baddle;


class Transaction {
   
    private static int $count = 0;
    public function __construct(
        public float $amount,
        public string $Description
    ){
        self::$count++;
       
    }
    

    public static function getCount(): int
    {
        return self::$count;
    }

    public function prrcess(){
        echo "Processing transaction....";
    }



  
    
}