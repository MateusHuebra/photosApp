<?php

namespace Controller;

class Profile extends LoggedController {

    function viewProfile(string $username) {
        $this->username = $username;
        $daoUser = new \Dao\User();
        $user = $daoUser->getByUsername($username);
        $this->view('Profile/index', [
            'profileUser' => $user,
            'error' => $this->showErrorMessage()
        ]);
    }

    function uploadProfilePicture() {
        try {
            $fileName = $this->uploadPicture("database/".$_SESSION['user']->getId(), 'profile', true, $_SESSION['user']->getPhoto());
        } catch(\Exception\UploadPictureError $exception) {
            $this->redirect($_SESSION['user']->getUsername(), $exception->getMessage());
        } catch(\Exception $exception) {
            $this->redirect($_SESSION['user']->getUsername(), $exception->getMessage());
        }

        $daoUser = new \Dao\User();
        $daoUser->savePhoto($fileName, $_SESSION['user']->getId());
        echo $_SESSION['user']->getId();
        $_SESSION['user']->setPhoto($fileName);
        $this->redirect($_SESSION['user']->getUsername(), 'Profile picture changed!');
    }

}