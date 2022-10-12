<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;

class GaneratorController
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $numbers = range(1, 49);
        print_r($numbers);
    }

    private function lazyRange(int $start,int $end)
    {
        $numbers = [];
        for ($i = $start; $i <= $end; $i++) {
            $numbers[] = $i;
        }
        return $numbers;
    }
}
