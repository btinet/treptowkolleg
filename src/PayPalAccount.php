<?php

namespace App;

class PayPalAccount implements BankAccountInterface
{
    private int $money = 0;

    public function deposit(int $amount): bool
    {
        $this->money += $amount;
        echo sprintf("Es wurden %s per PayPal eingezahlt.",$amount). PHP_EOL;
        return true;
    }

    public function withdraw(int $amount): bool
    {
        if($this->money - $amount >= 0) {
            $this->money -= $amount;
            echo sprintf("Es wurden %s per PayPal gezahlt.",$amount). PHP_EOL;
            return true;
        } else {
            echo "Der Verfügungsrahmen reicht nicht aus." . PHP_EOL;
            return false;
        }
    }
}