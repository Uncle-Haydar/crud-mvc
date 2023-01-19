<?php

spl_autoload_register(function($class) {
    
    $fullpath = "../" . str_replace('\\', '/', $class) . ".php";
    require_once $fullpath;
});

require '../app/Config/config.php';
require '../app/Config/helpers.php';
require '../app/Core/App.php';
require '../app/Core/View.php';
