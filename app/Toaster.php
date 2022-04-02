<?php

namespace App;

class Toaster
{
    protected array $slices;
    protected int   $size; // if it's was a private property, it would be accessible only from this class 

    public function __construct(){
        $this->slices  = [];
        $this->size    = 2;
    }
    public function addSlices(string $slice): void
    {
        // var_dump($this);
         if(count($this->slices) < $this->size) {
             $this->slices[] = $slice;
         }
    }

    public function toast(){
        foreach ($this->slices as $i => $slice) {
           echo($i + 1) . ': Toasting ' . $slice . PHP_EOL . "<br>";
        }
    }

    public function foo(){
        
    }
}