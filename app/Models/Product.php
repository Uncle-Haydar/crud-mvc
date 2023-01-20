<?php

namespace app\Models;


use app\Models\Model;

class Product extends Model {
    
    
    public function __construct() {
        
        $this->table = "products";
    }

}
