<?php

namespace Core;

class Request
{

    public static function uri(): string
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function method(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['method'])) {
            return $_POST['method'];
        }

        return $_SERVER['REQUEST_METHOD'];
    }

}