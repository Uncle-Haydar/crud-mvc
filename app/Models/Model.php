<?php

namespace app\Models;

use app\Config\DB;

class Model {

    use DB;
    
    
    public function all($table) {

        $query = "select * from $table";
        $result = mysqli_query($this->connectDB(), $query);
        if(!$result) {
            die("no result!!");
        }
        return $result;
    }

    public function find($table, $id) {

        $query = "select * from $table WHERE id = $id";
        $result = mysqli_query($this->connectDB(), $query);
        if(!$result) {
            die("no result!!");
        }
        return $result;
    }
    
    public function insert($sql) {

        $result = mysqli_query($this->connectDB(), $sql);
        if(!$result) {
            return false;
        }
        return true;
    }

    public function update($sql) {

        $result = mysqli_query($this->connectDB(), $sql);
        if(!$result) {
            return false;
        }
        return true;
    }

    public function delete($table, $id) {

        $sql = "DELETE FROM `$table` WHERE `id` = $id";
        $result = mysqli_query($this->connectDB(), $sql);
        if(!$result) {
            return false;
        }
        return true;
    }

}
