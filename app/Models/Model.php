<?php

namespace app\Models;

use app\Config\DB;

class Model {

    use DB;

    protected string $table;
    protected array $allowed_col;

    public function all() {

        $query = "select * from $this->table";
        $result = mysqli_query($this->connectDB(), $query);
        if (!$result) {
            die("no result!!");
        }
        return $result;
    }

    public function find($id) {

        $query = "select * from $this->table WHERE id = $id";
        $result = mysqli_query($this->connectDB(), $query);
        if (!$result) {
            die();
        }
        return $result;
    }

    public function insert($data)
    {
        if (!empty($this->allowed_col)) {
            foreach ($data as $key) {
                if (!in_array($key, $this->allowed_col)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $sql = "INSERT INTO $this->table (". implode(',', $keys) .") 
                VALUES ('". implode("','", $data) ."')";
        if (!mysqli_query($this->connectDB(), $sql)) {
            die('Data Not Inserted!!');
        }
    }

    public function update($data)
    {
        if (!empty($this->allowed_col)) {
            foreach ($data as $key) {
                if (!in_array($key, $this->allowed_col)) {
                    unset($data[$key]);
                }
            }
        }
        // $keys = array_keys($data);
        $sql = "UPDATE $this->table
                SET `name`='".$data['name']."',`price`='".$data['price'].
                "',`description`='".$data['description']."',`qty`='".$data['qty'].
                "' WHERE `id` = ".$data['id'];
        if (!mysqli_query($this->connectDB(), $sql)) {
            die('The Table Not Uptaded!!');
        }
    }

    public function delete($id) {

        $sql = "DELETE FROM `$this->table` WHERE `id` = $id";
        $result = mysqli_query($this->connectDB(), $sql);
        if (!$result) {
            return false;
        }
        return true;
    }

}
