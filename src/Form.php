<?php

namespace App;

class Form
{

    private array $data;

    public function __construct($isPost = true)
    {
        $this->data = $isPost ? $_POST : $_GET;
    }

    public function isPost(): bool
    {
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST';
    }

    public function getData(string $fieldName): ?string
    {
        return htmlspecialchars($this->data[$fieldName] ?? null);
    }

}