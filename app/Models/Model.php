<?php

namespace app\Models;

use app\Config\DB;

class Model
{

    use DB;

    protected string $table;
    protected array $allowed_col;

    /**
     *  Get all data from record of table
     */
    public function all($order = 'ASC')
    {
        $query = "SELECT * FROM $this->table ORDER BY `id` $order";
        $result = mysqli_query($this->connectDB(), $query);
        return $result;
    }

    /**
     *  Get one record from table
     */
    public function find($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $result = mysqli_query($this->connectDB(), $query);
        return $result;
    }

    /**
     *  Insert data to table
     */
    public function insert($data)
    {
        $keys = array_keys($data);
        $sql = "INSERT INTO $this->table (" . implode(',', $keys) . ") 
                VALUES ('" . implode("','", $data) . "')";
        if (!mysqli_query($this->connectDB(), $sql)) {
            die('Data Not Inserted!!');
        }
    }

    /**
     *  Update record of table
     */
    public function update($id, $data)
    {
        $keys = array_keys($data);
        $sql = "UPDATE $this->table SET ";
        foreach ($keys as $key) {
            $sql .= $key . "='" . $data[$key] . "', ";
        }
        $sql = trim($sql, ', ');
        $sql .= " WHERE `id` = $id";
        if (!mysqli_query($this->connectDB(), $sql)) {
            die('The Table Not Uptaded!!');
        }
    }

    /**
     *  Delete from table
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `$this->table` WHERE `id` = $id";
        $result = mysqli_query($this->connectDB(), $sql);
        if (!$result) {
            return false;
        }
        return true;
    }
}
