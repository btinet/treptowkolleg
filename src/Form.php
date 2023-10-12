<?php

namespace App;

class Form
{

    private array $data;

    public function __construct($isPost = true)
    {
        $this->data = $isPost ? $_POST : $_GET;
    }

    public function getData(string $fieldName): ?string
    {
        return htmlspecialchars($this->data[$fieldName] ?? null);
    }

}