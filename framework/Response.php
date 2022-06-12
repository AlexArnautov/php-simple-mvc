<?php

namespace framework;


class Response extends \Laminas\Diactoros\Response
{
    public function sendHeaders()
    {
        if ($this->headers) {
            foreach ($this->getHeaders() as $name => $values) {
                $name = str_replace(' ', '-', ucwords(str_replace('-', ' ', $name)));
                $replace = true;
                foreach ($values as $value) {
                    header("$name: $value", $replace);
                    $replace = false;
                }
            }
        }

        header("HTTP/1.1 {$this->getStatusCode()}");
    }

    public function sendContent()
    {
        echo $this->getBody();
    }

}