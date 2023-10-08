<?php

namespace App;

/**
 * @template T of object
 */
abstract class MyArray
{
    /**
     * @var T[] $list
     */
    protected array $list;

    /**
     * @var T $classname
     */
    protected mixed $classname;

    /**
     * @param class-string<T> $classname
     * @param T ...$instanceElements
     */
    public function __construct(string $classname, ...$instanceElements)
    {
        $this->classname = $classname;
        foreach ($instanceElements as $element) {
            if(is_array($element)) {
                $this->list = $element;
            } else {
                if($element instanceof $this->classname) {
                    $this->list[] = $element;
                }
            }
        }
    }

    /**
     * @return array<int, T>
     */
    public function getList(): array
    {
        return $this->list;
    }

}