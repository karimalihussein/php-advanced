<?php

namespace App;

use App\Exceptions\Container\NotFoundException;
use PHPUnit\Framework\Constraint\Callback;
use Psr\Container\ContainerInterface;


class Container implements ContainerInterface
{
    private $entries = [];

    public function get(string $id)
    {
        if(!$this->has($id)) {
            throw new NotFoundException("No entry or class found for $id");
        }
        $entry = $this->entries[$id];
        return $entry($this);
    }

    public function has(string $id) : bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id,Callback $concrete)
    {
        $this->entries[$id] = $concrete;
    }
}