<?php

namespace App;


class TextFieldType extends AbstractType
{

    public function __construct(string $name,AbstractType $parent, array $options = [])
    {
        parent::__construct($name,$options,$parent);
    }

    public function getData(): ?string
    {
        if ($this->parent instanceof Form) {
            return $this->parent->getFieldData($this->getName());
        }
        echo 'nope!';
        return null;
    }

    public function render(): string
    {
        $html = '';
        $html .= '<div class="field">' . PHP_EOL;
        if($label = $this->hasOption('label',true)) {
            $html .= '<label '.$this->placeId(true).' class="label">'.$label.'</label>';
        }
        $html .= '<div class="control">' . PHP_EOL;
        $html .= '<input '.$this->placeId().' type="text" '.$this->placeName().' '.$this->placeOptions().'>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL . '</div>' . PHP_EOL;
        return $html;
    }

}