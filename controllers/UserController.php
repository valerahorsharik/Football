<?php

namespace controllers;

use core\Controller as Controller;

class UserController extends Controller {
    
       
    /**
     * 
     * Display login form.
     * 
     */
    public function login() {
        $this->view->display('registration/login');
    }
    
    /**
     * 
     * Logout from account.
     * 
     */
    public function logout() {
        session_destroy();
        header('Location:/');
    }
}
