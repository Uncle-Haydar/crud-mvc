<?php

namespace app\Config;

trait DB {
    
    private static $connection;

    public function connectDB()
    {
        if (!self::$connection) {
            self::$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
            if(mysqli_connect_errno()) {
                die("no connect!! " . mysqli_connect_error());
            }
        }
        
        return self::$connection;
    }
    

}
