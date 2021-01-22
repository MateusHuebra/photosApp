<?php

namespace Controller;

class Authentication extends Controller {


	function login() {
		(new \Service\Authentication())->logout();
		$this->view('Authentication/header');
		$this->view('Authentication/login', [
			'error' => $this->showErrorMessage(),
			'info' => $this->showInfo()
		]);
		$this->view('Authentication/footer');
	}

	function signUp() {
		(new \Service\Authentication())->logout();
		$this->view('Authentication/header');
		$this->view('Authentication/signUp', [
			'error' => $this->showErrorMessage(),
			'info' => $this->showInfo()
		]);
		$this->view('Authentication/footer');
	}

	function loginCheck() {
		$daoUser = new \Dao\User();
		try {
			$user = $daoUser->getByUsernameOrEmailAndPassword($_POST['usernameOrEmail'], $_POST['password']);
		} catch(\Exception\InvalidCredentials $exception) {
			$this->redirect('authentication/login', $exception->getMessage(), $_POST['usernameOrEmail']);
		} catch(\Exception $exception) {
			$this->redirect('authentication/login');
		}

		(new \Service\Authentication())->login($user);
		$this->redirect('home');
	}

	function signUpNewAccount() {
		try {
			(new \Service\Authentication())->validateEmail($_POST['email']);
			(new \Service\Authentication())->validatePassword($_POST['password']);
		} catch(\Exception\InvalidEmail $exception) {
			$this->redirect('authentication/signUp', $exception->getMessage(), $_POST['email']);
		} catch(\Exception\InvalidPassword $exception) {
			$this->redirect('authentication/signUp', $exception->getMessage(), $_POST['email']);
		} catch(\Exception $exception) {
			$this->redirect('authentication/signUp');
		}

		$daoUser = new \Dao\User();
		$modelUser = new \Model\User(null, $_POST['email'], null, $_POST['email'], $_POST['password']);
		$daoUser->save($modelUser);
		$this->redirect('authentication/login');
	}

	private function showInfo() {
		if(isset($_GET['info'])) {
			return base64_decode($_GET['info']);
		}
	}

	private function showErrorMessage() {
		if(isset($_GET['error'])) {
   	 		return base64_decode($_GET['error']);
		}
	}
}