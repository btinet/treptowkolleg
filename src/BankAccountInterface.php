<?php

namespace App;

interface BankAccountInterface
{
    public function deposit(int $amount): bool;
    public function withdraw(int $amount): bool;
}