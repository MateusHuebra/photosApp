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
			'info' => $this->showInfo(),
			'info2' => $this->showInfo2()
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
			(new \Service\Authentication())->validateUsername($_POST['username']);
			(new \Service\Authentication())->validateEmail($_POST['email']);
			(new \Service\Authentication())->validatePassword($_POST['password']);
		} catch(\Exception\InvalidUsername $exception) {
			$this->redirect('authentication/signUp', $exception->getMessage(), $_POST['email'], $_POST['username']);
		} catch(\Exception\InvalidEmail $exception) {
			$this->redirect('authentication/signUp', $exception->getMessage(), $_POST['email'], $_POST['username']);
		} catch(\Exception\InvalidPassword $exception) {
			$this->redirect('authentication/signUp', $exception->getMessage(), $_POST['email'], $_POST['username']);
		} catch(\Exception $exception) {
			$this->redirect('authentication/signUp');
		}

		$daoUser = new \Dao\User();
		$modelUser = new \Model\User(null, $_POST['username'], null, $_POST['email'], $_POST['password']);
		$daoUser->save($modelUser);
		$this->redirect('authentication/login');
	}

	function updateInfo() {
		try {
			(new \Service\Authentication())->validateUsername($_POST['username']);
			(new \Service\Authentication())->validateEmail($_POST['email']);
		} catch(\Exception\InvalidUsername $exception) {
			$this->redirect('profile/edit', $exception->getMessage(), $_POST['email'], $_POST['username']);
		} catch(\Exception\InvalidEmail $exception) {
			$this->redirect('profile/edit', $exception->getMessage(), $_POST['email'], $_POST['username']);
		} catch(\Exception $exception) {
			$this->redirect('profile/edit');
		}

		$_SESSION['lang'] = $_POST['lang'];
		$daoUser = new \Dao\User();
		$modelUser = new \Model\User($_SESSION['user']->getId(), $_POST['username'], null, $_POST['email']);
		$user = $daoUser->updateInfo($modelUser);
		(new \Service\Authentication())->login($user);
		$this->redirect('profile/edit', call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.infoUpdated'));
	}

}