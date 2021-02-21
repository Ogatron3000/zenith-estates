<?php


namespace Core\Database;

use Core\App;

class Database
{

    public static function __callStatic($method, $arguments)
    {
        return App::get('database')->$method(...$arguments);
    }

}