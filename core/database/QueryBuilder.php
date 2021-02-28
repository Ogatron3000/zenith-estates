<?php

namespace Core\Database;

use Core\App;

use Core\Database\Database;
use PDOException;

class QueryBuilder
{

    // PDO CLASS CODE
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

    public static function search($params, $table = '')
    {
        if ( ! $table) {
            $table = self::determineTable($table);
        }
        $model = self::determineModel();

        $conditions = [];
        foreach ($params as $key => $value) {
            if ( ! empty($value) ) {
                $conditions[] = "{$key} LIKE '%{$value}%'";
            }
        }
        $conditions = implode(' AND ', $conditions);

        try {
            return Database::query("SELECT * FROM $table WHERE $conditions")
                ->fetchAll(self::$class_code, $model);
        } catch (PDOException $e) {
            return self::all($table);
        }

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
            return Database::lastInsertId();
        } catch (Exception $e) {
            die('Whoops, something went wrong.');
        }
    }

    public static function update($data, $table = '')
    {

        if ( ! $table) {
            $table = self::determineTable($table);
        }

        $values = '';

        foreach (array_slice($data, 1) as $key => $value) {
            $values .= "{$key}='{$value}', ";
        }
        $values = rtrim($values, ', ');

        try {
            // this is not good!
            // first PREPARE, then BIND parameters!!!
            Database::query("UPDATE {$table} SET {$values} WHERE id = {$data['id']}");
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

    public static function hasMany($model, $table, $id)
    {
        return Database::query("SELECT * FROM $table WHERE real_estate_id = $id")
            ->fetchAll(self::$class_code, "App\\Models\\" . $model);
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
