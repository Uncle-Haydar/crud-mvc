<?php

namespace app\Models;

use app\Config\DB;

class Model {

    use DB;
    
    
    public function all() {

        $query = "select * from $this->table";
        $result = mysqli_query($this->connectDB(), $query);
        if(!$result) {
            die("no result!!");
        }
        return $result;
    }

    public function find($id) {

        $query = "select * from $this->table WHERE id = $id";
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

    public function delete($id) {

        $sql = "DELETE FROM `$this->table` WHERE `id` = $id";
        $result = mysqli_query($this->connectDB(), $sql);
        if(!$result) {
            return false;
        }
        return true;
    }

}
