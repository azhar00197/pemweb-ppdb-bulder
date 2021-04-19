<?php

class Model
{
    protected static $db;
    protected static function initDb()
    {
        require __DIR__ . '/../connection.php';
        self::$db = $db;
    }

    protected static function closeDb()
    {
        self::$db->close();
    }

    protected static function timeToSqlDatetime($time)
    {
        return date("Y/m/d H:i:s", $time);
    }
}
