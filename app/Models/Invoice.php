<?php 

namespace App\Models;


class Invoice 
{
    public function __construct(public float $amount, public string $description)
    {
    }
      
    
}