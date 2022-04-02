<?php

namespace App;

class ToasterPro extends Toaster
{
    
    public function __construct()
    {
        parent::__construct();
        $this->size = 4;
    }


    public function addSlices(string $slice): void
    {
        parent::addSlices($slice);
       
    }   
    public function toastBagel(){
        foreach ($this->slices as $i => $slice) {
           echo($i + 1) . ': Toasting ' . $slice .' with bagels options '. PHP_EOL . "<br>";   
        }
    }

    public function foo(){
        throw new \Exception('Not Supported');
    }
}