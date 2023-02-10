<?php

session_start();

require 'autoload.php';

use app\Config\DB;
use app\Models\_Model;

try {
    
    new _Model(DB::connectDB());
    
} catch (\PDOException $e) {
    die($e->getMessage());
}
new App();
