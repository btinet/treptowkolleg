<?php

namespace App;

use JetBrains\PhpStorm\Pure;

class TextFieldType extends AbstractType
{

    public function __construct(string $name, array $options = [])
    {
        parent::__construct($name,$options);
    }

    function render(): string
    {
        return '<input type="text" name="'.$this->name.'">' . PHP_EOL;
    }
}