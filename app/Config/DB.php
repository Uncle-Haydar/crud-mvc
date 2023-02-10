<?php

namespace app\Config;

class DB {

    private static $connection;

    private function __construct() {
        
    }

    public static function connectDB() {
        if (!self::$connection) {
            self::$connection = new \PDO(DSN, USERNAME, PASSWORD);
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }

}
