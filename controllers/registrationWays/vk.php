<?php

namespace controllers\registrationWays;

class vk {
//    $client_id = '5904978';
//        $client_secret ='U0JEQEOJj9pqA50gSnOa';
//        $redirect_uri ='http://pretty-simple.mcdir.ru/auth/social/' ;
//        $code = $_GET['code'];
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, "https://oauth.vk.com/access_token?client_id={$client_id}&client_secret={$client_secret}&redirect_uri={$redirect_uri}&code={$code}");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
//        $_SESSION['access_token'] = curl_exec($ch);
//        curl_close($ch);
//        header('Location:/');

    /**
     *
     * Id of my VK application
     * 
     * @var int
     */
    private $client_id = 5904978;

    /**
     *
     * Secret code of my VK application
     * 
     * @var string
     */
    private $client_secret = 'U0JEQEOJj9pqA50gSnOa';

    /**
     *
     * Redirect URI 
     * 
     * @var string
     */
    private $redirect_uri = 'http://pretty-simple.mcdir.ru/auth/social/vk/';

    /**
     *
     * Contains temporary code for access token
     * 
     * @var int
     */
    private $code = null;

    /**
     *
     * Contains user's data
     * 
     * @var array
     */
    private $userData = [];

    /**
     *
     * Consist name of fields, which we wanna get from VK api
     * 
     * @var array
     */
    private $necessaryData = ['email', 'user_id'];

    public function __construct($code) {
        $this->getAccessToken($code);
    }
    
   /**
    * 
    * Get access token from VK
    * 
    * @param int $code
    */
    private function getAccessToken($code) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://oauth.vk.com/access_token?client_id={$this->client_id}&client_secret={$this->client_secret}&redirect_uri={$this->redirect_uri}&code={$code}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $answer = json_decode(curl_exec($ch));
        curl_close($ch);
        $this->setUsersData($answer);
        $this->accessToken = $answer->access_token;
    }
    
    /**
     * 
     * Set user data in accordance with $this->necessaryData
     * 
     * @param \stdClass $data
     */
    private function setUsersData($data) {
        foreach ($this->necessaryData as $nameOfField) {
            if (isset($data->$nameOfField)) {
                $this->userData[$nameOfField] = $data->$nameOfField;
            }
        }
    }

}
