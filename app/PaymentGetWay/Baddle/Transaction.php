<?php

declare(strict_types=1);
namespace App\PaymentGetWay\Baddle;

use App\Enums\Status;

class Transaction {

  
    private string $status;

    public function __construct(){
        // self && $this && current class name

        $this->setStatus(Status::PAID);
        // var_dump(self::STATUS_PAID);
    }

    public function setStatus(string $status): self{
        if(!isset(Status::ALL_STATUSES[$status])){
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->status = $status;
        return $this;
    }

  
    
}