<?php

namespace App;

class Customer
{
    private array $myProducts = [];

    public function payFor(StoreProduct $product, BankAccountInterface $bankAccount) : void
    {
        echo "Versuche, {$product->getLabel()} zu kaufen" . PHP_EOL;
        if($bankAccount->withdraw($product->getPrice())) {
            echo sprintf("%s wurde gekauft.",$product->getLabel()). PHP_EOL;
            $this->myProducts[] = $product;
        }
    }

    public function getMyProducts(): array
    {
        return $this->myProducts;
    }

}
