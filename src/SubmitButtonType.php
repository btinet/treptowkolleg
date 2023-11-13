<?php

namespace App;


class SubmitButtonType extends AbstractType
{

    public function __construct(string $name,AbstractType $parent, array $options = [])
    {
        parent::__construct($name,$options,$parent);
    }

    public function getData(): ?string
    {
        return null;
    }

    public function render(): string
    {
        return  '<button '.$this->placeId().' type="submit" '.$this->placeName().' '.$this->placeOptions().'>' .$this->getLabel(). '</button>';
    }

}