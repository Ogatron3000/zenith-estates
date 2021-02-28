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
            $method = $_POST['method'];
            $_POST = array_slice($_POST, 1);
            return $method;
        }

        return $_SERVER['REQUEST_METHOD'];
    }

    public static function query(): array
    {
        $queries = [];
        parse_str($_SERVER['QUERY_STRING'], $queries);
        return $queries;
    }

}