<?php
session_start();

require 'autoload.php';

use app\Config\DB;
use app\Models\_Model;


new _Model(new DB);
new App();