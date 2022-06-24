<?php

namespace Libs\Traits;

trait Db
{
    public static function connect()
    {
        // Данные от БД
        $host = "localhost";
        $user = "root";
        $password = "root";
        $name = "meemoney";

        $mysqli_connect = mysqli_connect($host, $user, $password, $name);
        mysqli_set_charset($mysqli_connect, "utf8");

        return $mysqli_connect;
    }

    /**
     * Запрос в базу
     *
     * @param $query
     * @return bool|\mysqli_result
     */
    public static function query($query)
    {
        $ready_query = $query." SET NAMES 'utf8'";
        mysqli_set_charset(self::connect(), "utf8");

        return mysqli_query(self::connect(), $query);
    }

    /**
     * Запрос с преобразованным ответом
     *
     * @param $query
     * @return array|false|null
     */
    public static function fQuery($query)
    {
        $ready_query = $query." SET NAMES 'utf8'";
        mysqli_set_charset(self::connect(), "utf8");
        return mysqli_fetch_assoc(mysqli_query(self::connect(), $query));
    }
}