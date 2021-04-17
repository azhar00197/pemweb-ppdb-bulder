<?php

class Model
{
    protected static $db;
    protected static function initDb()
    {
        require_once __DIR__ . '/../connection.php';
        self::$db = $db;
    }

    protected static function closeDb()
    {
        self::$db->close();
    }
}
