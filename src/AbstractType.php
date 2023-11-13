<?php

namespace App;

abstract class AbstractType
{

    protected string $name;
    protected string $label;
    protected array $options = [];
    protected ?AbstractType $parent;
    protected array $children = [];

    public function __construct(string $name, array $options = [], AbstractType $parent = null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->parent = $parent;

        if($label = $this->hasOption('label')){
            $this->label = $label;
        } else {
            $this->label = '';
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    protected function placeOptions(): string
    {
        $formOptions = '';
        foreach ($this->options as $attribute => $value) {
            $formOptions .= $attribute . '="'.$value.'" ';
        }
        return $formOptions;
    }

    protected function placeChildren() : string{
        $children = '';
        foreach ($this->children as $child) {
            /** @var $child AbstractType */
            $children .= $child->render();
        }
        return $children;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function hasOption(string $key, bool $remove = false): ?string
    {
        $option = null;
        if(array_key_exists($key,$this->options)) {
            $option = $this->options[$key];
            if($remove) {
                unset($this->options[$key]);
            }
        }
        return $option;
    }

    protected function placeName(): string
    {
        return 'name="'.$this->name.'"';
    }

    protected function placeId(bool $label = false): string
    {
        if($label) {
            return 'for="'.$this->name.'"';
        }
        return 'id="'.$this->name.'"';
    }

    abstract function render(): string;

    public function getData()
    {
        echo 'okeh!';
        return null;
    }

}