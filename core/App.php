<?php

namespace Core;

use RuntimeException;

class App
{

    protected static array $registry = [];

    public static function bind($key, $value): void
    {
        self::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if ( ! array_key_exists($key, self::$registry)) {
            throw new RuntimeException("No value exists for given key: {$key}.");
        }

        return self::$registry[$key];
    }

}