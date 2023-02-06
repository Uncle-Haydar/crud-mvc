<?php

use app\Controllers\_Controller;

class HomeController extends _Controller
{
    public function index()
    {
        $this->view('welcome');
    }
}
