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

    private static int $class_code = 8;

    public static function all($table = '')
    {
        if ( ! $table) {
            $table = self::determineTable($table);
        }
        $model = self::determineModel();

        return Database::query("SELECT * FROM $table")
            ->fetchAll(self::$class_code, $model);
    }

    public static function findById($id, $table = '')
    {
        if ( ! $table) {
            $table = self::determineTable($table);
        }
        $model = self::determineModel();


        $res = Database::query("SELECT * FROM $table WHERE id = $id")
            ->fetchAll(self::$class_code, $model);

        return $res ? $res[0] : null;
    }

    public static function insert($data, $table = '')
    {
        if ( ! $table) {
            $table = self::determineTable($table);
        }

        $keys   = implode(', ', array_keys($data));
        $values = implode(', ', array_map(function ($val) {
            return "'$val'";
        }, $data));

        try {
            // this is not good!
            // first PREPARE, then BIND parameters!!!
            Database::query("INSERT INTO {$table} ({$keys}) VALUES ({$values})");
        } catch (Exception $e) {
            die('Whoops, something went wrong.');
        }
    }

    public static function delete($id, $table = '')
    {
        if ( ! $table) {
            $table = self::determineTable($table);
        }

        Database::query("DELETE FROM $table WHERE id = $id");
    }

    public static function hasOne($model, $table, $id, $field = '*')
    {
        $res = Database::query("SELECT $field FROM $table WHERE id = $id")
            ->fetchAll(self::$class_code, "App\\Models\\" . $model);

        if ($field !== '*') {
            return $res[0]->$field;
        }

        return $res[0];
    }

    private static function determineTable($table): string
    {
        $table = strtolower(implode('_',
                array_slice(preg_split('/(?=[A-Z])/',
                    substr(static::class, 11)), 1)));

        if (strpos($table, 'y') === strlen($table) - 1) {
            $table = rtrim($table, 'y') . 'ies';
        } else {
            $table .= 's';
        }

        return $table;
    }

    public static function determineModel(): string
    {
        return "App\\Models\\" . substr(static::class, 11);
    }

}
