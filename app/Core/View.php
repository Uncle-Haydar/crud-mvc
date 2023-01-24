<?php

class View {
    
    /*
     * Loade Views Pages 
     */

    public static function load($view, $data = []) {

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

    /*
    *   Redirect Function
    */
    public static function redirect($path)
    {
        header("Location: " . BURL . $path);
        exit();
    }


}
