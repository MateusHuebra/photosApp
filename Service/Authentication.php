<?php

namespace Service;

class Authentication {

	function __construct() {
		session_start();
	}

	function login(\Model\User $user) {
		$_SESSION['user'] = $user;
	}

	function isLogged() : bool {
		return isset($_SESSION['user']);
	}

	function logout() {
		session_destroy();
	}

	function authenticateEmail(string $email) {
		if(empty($email)) {
			throw new \Exception\InvalidCredentials("Email is empty");
		} else if (strlen($email) > 128) {
			throw new \Exception\InvalidCredentials("Email is too long</br> max: 128 characters");
		//} else if (!preg_match("/^[A-Za-z0-9_@.]{1,128}$/", $email)) {
		//	return "email cannot have special characters</br> just letters, numbers";
	
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new \Exception\InvalidCredentials("It must be an email");
		} else if ((new \Dao\User())->checkEmailExists($email)) {
			throw new \Exception\InvalidCredentials("Email already being used");
		}
	}

}