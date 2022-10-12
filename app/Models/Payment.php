<?php

namespace App\Models;

use App\Enums\PaymentStatus;

class Payment 
{
   private PaymentStatus $status;

   public function updateStatus(PaymentStatus $status)
   {
       $this->status = $status;
       return $this;
   }

   public function getStatus(): PaymentStatus
   {
       return $this->status;
   }
   
   
}