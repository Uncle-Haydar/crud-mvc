<?php

namespace app\Config;

use PDO;
use PDOException;

trait DB
{
    private static $connection;

    public function connectDB()
    {
        try {
            if (!self::$connection) {
                self::$connection = new PDO(DSN, USERNAME, PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo "Fieled to Connection => " . $e->getMessage();
        }

        return self::$connection;
    }
}
