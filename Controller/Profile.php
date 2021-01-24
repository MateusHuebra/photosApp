<?php

namespace Controller;

class Profile extends LoggedController {
    
    function viewProfile(string $username) {
        $this->view('Profile/index', [
            'profileUsername' => $username
        ]);
    }

}