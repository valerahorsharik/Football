<?php

namespace controllers;

use core\Controller as Controller;

class HomeController extends Controller{
    
    public function index() {
        $this->view->display('default', ['a' => 7]);
    }
}
