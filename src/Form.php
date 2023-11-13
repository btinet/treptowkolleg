<?php

namespace App;

class Form extends AbstractType
{

    private array $data;

    public function __construct(string $name, array $options = [], $isPost = true)
    {
        parent::__construct($name, $options);

        if($isPost) {
            $this->addOption('method','post');
            $this->data = $_POST;
        } else {
            $this->addOption('method','get');
            $this->data = $_GET;
        }

    }

    public function isPost(): bool
    {
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST';
    }

    public function addOption(string $attribute, string $value) : Form
    {
        $this->options[$attribute] = $value;
        return $this;
    }

    public function addField(string $name, string $type = TextFieldType::class, array $options = []): Form
    {
        $this->children[$name] = new $type($name, $this, $options);
        return $this;
    }

    public function getFieldData(string $fieldName): ?string
    {
        if(array_key_exists($fieldName,$this->children)) {
            return htmlspecialchars($this->data[$fieldName] ?? null);
        }
        return null;
    }

    public function render(): string
    {


        $html = "<form {$this->placeName()} {$this->placeOptions()}>{$this->placeChildren()}";
        $html .= '</form>';
        return $html;
    }

}