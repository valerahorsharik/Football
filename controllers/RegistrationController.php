<?php

namespace controllers;

use core\Controller as Controller;
use controllers\registrationWays\vk as vk;
class RegistrationController extends Controller {
   
    /**
     * Display login form.
     */
    public function loginForm() {
        $this->view->display('registration/login');
    }
    
    public function vk() {
        $code = $_GET['code'];
        $vk = new vk($code);
        $vk->login();
    }

}
