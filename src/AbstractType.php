<?php

namespace App;

abstract class AbstractType
{

    protected string $name;

    public function __construct(string $name, array $options = [])
    {
        $this->name = $name;
    }

    abstract function render(): string;
}