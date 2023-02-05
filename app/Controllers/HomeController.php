<?php

use App\Controllers\_Controller;

class HomeController extends _Controller
{
    public function index()
    {
        $this->view('welcome');
    }
}
