<?php 

namespace App\Models;


class Invoice 
{
    public function __construct(public float $amount, public string $description)
    {
        $this->id = uniqid('invoice_');   
    }

    public function __clone()
    {
        $this->id = uniqid('invoice_');
    }

    public function process()
    {
        if($this->amount <= 0) {
            throw new \Exception('Amount must be greater than 0');
        }
        echo "Processing invoice {$this->id} for {$this->amount} with description {$this->description}";
        sleep(1);
        echo "Done processing invoice {$this->id} for {$this->amount} with description {$this->description}";

    }


      
    
}