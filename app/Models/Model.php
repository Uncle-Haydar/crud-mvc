<?php

namespace App\Models;


class Model
{
    protected static $conn;
    protected string $table;
    // protected array $allowed_col;   //  Later

    public function __construct($db)
    {
        self::$conn = $db->connectDB();
    }

    /**
     *  Get all data from record of table
     */
    public function all($order = 'ASC')
    {
        $query = "SELECT * FROM $this->table ORDER BY `id` $order";
        $stmt = self::$conn->prepare($query);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    /**
     *  Get one record from table
     */
    public function find($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $stmt = self::$conn->prepare($query);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    /**
     *  Insert data to table
     */
    public function insert($data)
    {
        $keys = array_keys($data);
        $sql = "INSERT INTO $this->table (" . implode(',', $keys) . ") 
                VALUES (:" . implode(",:", $keys) . ")";
        
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($data);
    }

    /**
     *  Update record of table
     */
    public function update($id, $data)
    {
        $keys = array_keys($data);
        $sql = "UPDATE $this->table SET ";
        foreach ($keys as $key) {
            $sql .= $key . "=:". $key.", ";
        }
        $sql = trim($sql, ', ');
        $sql .= " WHERE `id` = $id";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($data);
    }

    /**
     *  Delete from table
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `$this->table` WHERE `id` = $id";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute([]);
    }
}
