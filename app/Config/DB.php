<?php

namespace app\Config;

trait DB {
    
    protected $table;

    public function connectDB() {

        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        if(mysqli_connect_errno()) {
            die("no connect!! " . mysqli_connect_error());
        }
        
        return $conn;
    }
    
    public function chTable($table) {
        $this->table = $table;
    }

}
