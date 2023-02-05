<?php
session_start();

require 'autoload.php';

use App\Config\DB;
use App\Models\_Model;


new _Model(new DB);
new App();