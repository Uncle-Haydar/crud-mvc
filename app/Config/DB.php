<?php

namespace App\Config;

class DB {

    private static $connection;
    

    public function connectDB() {
        try {
            if (self::$connection === null) {
                self::$connection = new \PDO(DSN, USERNAME, PASSWORD);
                self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

        return self::$connection;
    }

}
