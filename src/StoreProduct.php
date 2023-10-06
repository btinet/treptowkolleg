<?php

namespace App;

class StoreProduct
{
    private string $label;
    private int $price;

    public function __construct(string $label, int $price)
    {
        $this->label = $label;
        $this->price = $price;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getPrice() : int
    {
        return $this->price;
    }

}
