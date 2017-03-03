<?php

namespace controllers;

use core\Controller as Controller;

class HomeController extends Controller{
    
    public function index() {
        $this->view->display('test', ['a' => 7]);
    }
}
