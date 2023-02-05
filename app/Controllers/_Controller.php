<?php

namespace App\Controllers;

class _Controller
{
    public function view($view, $data = [])
    {
        extract($data);
        $file = VIEWS . $view . '.php';

        if (file_exists($file)) {

            ob_start();
            require $file;
            ob_end_flush();
        } else {

            echo "Page Not Found!!";
        }
    }

    public function redirect($path)
    {
        header("Location: " . BURL . $path);
        exit();
    }
}
