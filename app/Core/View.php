<?php


class View {
    
    public static function load($view, $data = []) {
        
        extract($data);
        $file = VIEWS . $view . '.php';
        
        if(file_exists($file)) {
            
            ob_start();
            require $file;
            ob_end_flush();
        } else {
            
            echo "Page Not Found!!";
        }
    }
}
