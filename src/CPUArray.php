<?php

namespace App;

/**
 * @phpstan-template T
 */
class CPUArray extends MyArray
{

    /**
     * @param CPU ...$elements
     */
    public function __construct(...$elements)
    {
        parent::__construct(CPU::class,$elements);
    }

    /**
     * @return array<CPU>
     */
    public function getList(): array
    {
        return parent::getList();
    }


}