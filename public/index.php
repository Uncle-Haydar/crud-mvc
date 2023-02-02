<?php
session_start();

require 'autoload.php';

use App\Config\DB;
use App\Models\Model;


new Model(new DB);
new App();