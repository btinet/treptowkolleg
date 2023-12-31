<?php
/*
 * Copyright (c) 2022. Benjamin Wagner
 */

namespace App;

use RuntimeException;
use function curl_close;
use function curl_errno;
use function curl_error;
use function curl_exec;
use function curl_init;
use function curl_setopt;
use function is_resource;

class Curli
{
    private string $url;
    private array $options;

    /**
     * @param string $url Request URL
     * @param array $options cURL options
     */
    public function __construct(string $url, array $options = [])
    {
        $this->url = $url;
        $this->options = $options;
    }

    /**
     * Get the response
     * @param array $post
     * @return string
     */
    public function getResponse(array $post): string
    {
        $ch = curl_init($this->url);

        foreach ($this->options as $key => $val) {
            curl_setopt($ch, $key, $val);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);


        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);


        $response = curl_exec($ch);
        $error = curl_error($ch);
        $errno = curl_errno($ch);
        if (is_resource($ch)) {

            curl_close($ch);
        }

        if (0 !== $errno) {
            throw new RuntimeException($error, $errno);
        }

        return $response;
    }

}
