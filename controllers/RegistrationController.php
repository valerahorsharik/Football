<?php

namespace controllers;

use core\Controller as Controller;
use controllers\registrationWays\vk as vk;
use controllers\registrationWays\vk as fb;

class RegistrationController extends Controller {
   
    /**
     * Login/registration via vk
     * @see controllers\registrationWays\vk
     */
    public function vk() {
        $code = $_GET['code'];
        $vk = new vk($code);
        $vk->tryToLogin();
    }
    
    /**
     * Login/registration via fb
     * @see controllers\registrationWays\fb
     */
    public function fb() {
        $fb = new $fb();
    }
     
}
