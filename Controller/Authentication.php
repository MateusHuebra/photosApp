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

		}

		(new \Service\Authentication())->login($user);
		$this->redirect('home');
	}

	function signUpNewAccount() {
		$daoUser = new \Dao\User();

		if(empty($_POST['email'])) {
			echo "email is empty";
			die();
		} else if (strlen($_POST['email']) > 128) {
			echo "email is too long</br> max: 128 characters";
			die();
		//} else if (!preg_match("/^[A-Za-z0-9_@.]{1,128}$/", $_POST['email'])) {
		//	echo "email cannot have special characters</br> just letters, numbers";
		//	die();
		} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo "it must be an email";
			die();
		} else if ($daoUser->checkEmailExists($_POST['email'])) {
			echo "email already being used";
			die();
		}

		
		$daoUser->save($_POST['email'], $_POST['password']);
		$this->redirect('authentication/login');
	}
}