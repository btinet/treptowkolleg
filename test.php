<?php

use App\CPU;
use App\Customer;
use App\PayPalAccount;
use App\Sort;
use App\StoreProduct;

require 'vendor/autoload.php';


// Array mit Objekten
$array = [new CPU("Intel"), new CPU("AMD"), new CPU("Texas Instruments"), new CPU("Analog Devices")];

// Methode zum Sortieren von Arrays
// uasort(array &$array, callable $callback);
uasort($array, new Sort('name'));

// Gibt Objekte sortiert nach Name aus.
//print_r($array);

$microwaveProduct = new StoreProduct('Mikrowelle',20);
$customer = new Customer();
$paypal = new PayPalAccount();
$paypal->deposit(50);
$customer->payFor($microwaveProduct,$paypal);


$customer->payFor($microwaveProduct,$paypal);
echo $paypal->getAmount();