<?php

namespace app\Models;


use app\Models\Model;

class Product extends Model {
    
    public function setTable() {
        
        $this->table = "haydar";
    }
    
    public function getTable() {
        
        return $this->table;
    }

}
