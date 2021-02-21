<?php

namespace Core\Database;

use Core\App;

use Core\Database\Database;

class QueryBuilder
{

    //    protected PDO $pdo;
    //
    //    public function __construct(PDO $pdo)
    //    {
    //        $this->pdo = $pdo;
    //    }

    /*
    connection -> app container
    app container -> database
    database -> query builder
    query builder -> model
    model -> controller

    connection -> app container
    app container -> database
    database -> query builder
    query builder -> app container
    app container -> Model
    Model -> model
    model -> controller
    */

    public static function all($table = ''): array
    {
        $table = self::determineTable($table);

        return Database::query("SELECT * FROM {$table};")->fetchAll();
    }

    private static function determineTable($table): string
    {
        if ( ! $table) {
            $table = strtolower(substr(static::class, 11)) . 's';
        }

        return $table;
    }

}
