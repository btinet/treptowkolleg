<?php

namespace App;


class TextFieldType extends AbstractType
{

    public function __construct(string $name, array $options = [])
    {
        parent::__construct($name,$options);
    }

    function render(): string
    {
        $html = '';
        if($label = $this->hasOption('label',true)) {
            $html .= '<label '.$this->placeId(true).'>'.$label.'</label>';
        }

        $html .= '<input '.$this->placeId().' type="text" '.$this->placeName().' '.$this->placeOptions().'>' . PHP_EOL;
        return $html;
    }

}