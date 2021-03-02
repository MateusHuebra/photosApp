<?php

namespace Controller;

class Create extends LoggedController {

    function index() {
        $this->view('Create/index', [
            'error' => $this->showErrorMessage(),
			'info' => $this->showInfo()
        ]);
    }

    function post() {
        try {
            $fileName = $this->uploadPicture("database/".$_SESSION['user']->getId(), time());
        } catch(\Exception\UploadPictureError $exception) {
            $this->redirect('create', $exception->getMessage(), $_POST['postText']);
        } catch(\Exception $exception) {
            $this->redirect('create', $exception->getMessage(), $_POST['postText']);
        }

        $daoPost = new \Dao\Post();
        $post = new \Model\Post(null, $_POST['postText'], $fileName, null, $_SESSION['user']->getId());
        $daoPost->save($post);
        $this->redirect('create', call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.yourPictureWasPosted'));
    }
}