<?php

namespace controllers;

use core\Controller as Controller;
use controllers\registrationWays\vk as vk;
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
     
}
