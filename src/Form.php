<?php

namespace App;

class Form
{

    private array $data;
    private array $fields = [];
    private array $options = [];

    public function __construct(array $options = [], $isPost = true)
    {
        $this->options = $options;
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
        $this->fields[$name] = new $type($name,$options);
        return $this;
    }

    public function getFieldData(string $fieldName): ?string
    {
        if(array_key_exists($fieldName,$this->fields)) {
            return htmlspecialchars($this->data[$fieldName] ?? null);
        }
        return null;
    }

    public function renderForm(): string
    {
        $formOptions = '';
        foreach ($this->options as $attribute => $value) {
            $formOptions .= $attribute . '="'.$value.'" ';
        }

        $formFields = '';
        foreach ($this->fields as $field) {
            /** @var $field AbstractType */
            $formFields .= $field->render();
        }

        $html = '<form ';
        $html .= "$formOptions";
        $html .= '>' . PHP_EOL;
        $html .= $formFields;
        $html .= '</form>';
        return $html;
    }

}