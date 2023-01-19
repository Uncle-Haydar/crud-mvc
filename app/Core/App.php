<?php

class App {

    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];

    public function __construct() {

        $this->prepareURI();
    }

    private function prepareURI() {

        $url = $this->getURI();
        $file = "../app/Controllers/" . ucfirst($url[0]) . "Controller.php";

        /** Select Controller * */
        if (file_exists($file)) {
            $this->controller = ucfirst($url[0]) . "Controller";
            unset($url[0]);
        }
        require '../app/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        /** Select Method * */
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                echo "method not found!!";
            }
        }

        /** Select Params * */
        $url = array_values($url);
        $this->params = $url;

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function getURI() {

        $URI = filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_URL);
        return explode('/', $URI);
    }

}
