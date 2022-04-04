<?php


namespace App;

class Invoice {

    // protected float $amount;
      protected array $data;
    public function __construct(float $amount) 
    {
        $this->amount = $amount;
    } 
    public function __get(string $name)
    {
        if(property_exists($this, $name)){
            return $this->$name;
        }
        return "Not Found";
    }

    public function __set(string $name, $value): void
    {
        if(property_exists($this, $name)){
            $this->$name = $value;
        }
       
       
    }


}