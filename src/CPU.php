<?php

namespace App;

class CPU
{

    // Attribut
    private string $name;

    // Attribut mit Anfangswert
    private float $frequency = 0.0;

    // Konstruktor
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // Getter und Setter
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFrequency(): float
    {
        return $this->frequency;
    }

    public function setFrequency(float $frequency): void
    {
        $this->frequency = $frequency;
    }

}
