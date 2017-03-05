<?php
return array(
    //Registration routes

    'auth/social/vk/*' => 'registration/vk/$1',
    
    //User's routes
    'logout' => 'user/logout',
    'login' => 'user/login',
    
    '' => 'home/index',
);
