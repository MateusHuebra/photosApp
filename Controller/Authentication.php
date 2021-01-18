<?php

namespace Controller;

class Authentication extends Controller {


	function login() {
		(new \Service\Authentication())->logout();
		$this->view('Authentication/login');
	}

	function signUp() {
		(new \Service\Authentication())->logout();
		$this->view('Authentication/signUp');
	}

	function loginCheck() {
		$daoUser = new \Dao\User();
		try {
			$user = $daoUser->getByUsernameOrEmailAndPassword($_POST['usernameOrEmail'], $_POST['password']);
		} catch(\Exception\InvalidCredentials $exception) {
			$this->redirect('authentication/login', $exception->getMessage());
		} catch(\Exception $exception) {
			$this->redirect('authentication/login');
		}

		(new \Service\Authentication())->login($user);
		$this->redirect('home');
	}

	function signUpNewAccount() {
		try {
			(new \Service\Authentication())->authenticateEmail($_POST['email']);
		} catch(\Exception\InvalidCredentials $exception) {
			$this->redirect('authentication/signUp', $exception->getMessage());
		} catch(\Exception $exception) {
			$this->redirect('authentication/signUp');
		}

		$daoUser = new \Dao\User();
		$daoUser->save($_POST['email'], $_POST['password']);
		$this->redirect('authentication/login');
	}
}