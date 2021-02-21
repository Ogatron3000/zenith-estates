<?php

namespace Core\Database;

use PDO;
use PDOException;

class Connection
{

    public static function make($config): PDO
    {
        ($config);
        try {
            return new PDO($config['connection'] . ';dbname=' . $config['db'],
                $config['user'], $config['password'], $config['options']);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

}