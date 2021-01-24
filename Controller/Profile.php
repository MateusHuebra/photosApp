<?php

namespace Controller;

class Profile extends LoggedController {
    
    function viewProfile(string $username) {
        $daoUser = new \Dao\User();
        $user = $daoUser->getByUsername($username);
        $this->view('Profile/index', [
            'user' => $user
        ]);
    }

}