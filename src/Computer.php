<?php

namespace App;

class Computer
{
    // Typed Properties (Attribute mit vordefiniertem Datentyp): PHP >= 7.4
    private int $ram;

    // Das Fragezeichen vor dem Datentypen gibt an, dass dieses Attribut auch 'null' sein darf.
    private ?string $gear;

    private int $ssd;

    // Andere Klassen stellen auch Datentypen dar. Hier: unsere erstelle Klasse 'CPU'
    private CPU $cpu;

    // Konstruktor mit Pflichtparametern, optionale Parameter am Ende der Parameterliste
    public function __construct(int $ram, int $ssd, CPU $cpu, string $gear = null)
    {
        $this->ram = $ram;
        $this->gear = $gear;
        $this->ssd = $ssd;
        $this->cpu = $cpu;
    }

    // Getter für die Pflichtparameter
    public function getRam(): int
    {
        return $this->ram;
    }

    public function getSsd(): int
    {
        return $this->ssd;
    }

    public function getCpu(): CPU
    {
        return $this->cpu;
    }

    // Setter und Getter für das optionale Attribut
    public function setGear(string $gear): void
    {
        $this->gear = $gear;
    }

    public function getGear(): ?string
    {
        return $this->gear;
    }

}
