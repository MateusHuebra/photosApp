<?php

namespace Controller;

class Profile extends LoggedController {

    function viewProfile(string $username) {
        $this->username = $username;
        $daoUser = new \Dao\User();
        $daoPost = new \Dao\Post();
        $daoFollow = new \Dao\Follow();
        $user = $daoUser->getByUsername($username);
        $profileInfo['posts'] = $daoPost->getCountById($user->getId());
        $profileInfo['followers'] = $daoFollow->getFollowersCount($user->getId());
        $profileInfo['following'] = $daoFollow->getFollowingCount($user->getId());
        $this->view('Profile/index', [
            'profileUser' => $user,
            'profileInfo' => $profileInfo,
            'error' => $this->showErrorMessage()
        ]);
    }

    function edit() {
        $this->view('Profile/edit', [
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
        //echo $_SESSION['user']->getId();
        $_SESSION['user']->setPhoto($fileName);
        $this->redirect($_SESSION['user']->getUsername(), \Service\Translation::get('toasts.profilePictureChanged'));
    }

    function follow() {
        $daoFollow = new \Dao\Follow();
        $daoFollow->set($_SESSION['user']->getId(), $_POST['followsId']);
    }

    function unfollow() {
        $daoFollow = new \Dao\Follow();
        $daoFollow->unset($_SESSION['user']->getId(), $_POST['followsId']);
    }

    function isFollowing() {
        $daoFollow = new \Dao\Follow();
        $response = $daoFollow->getById($_SESSION['user']->getId(), $_POST['followsId']);
        $this->json($response);
    }

    function seeFollows() {
		$daoFollow = new \Dao\Follow();
		$result = $daoFollow->get($_POST['profileId'], $_POST['action']);

		$this->json($result);
	}

}