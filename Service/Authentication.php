<?php

namespace Service;

class Authentication {

	function __construct() {
		if(session_id() == '') {
			session_start();
		}
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

	function validateUsername(string $username) {
		$reservedWords = [
			'authentication',
			'controller',
			'create',
			'home',
			'loggedcontroller',
			'pagenotfound',
			'post',
			'profile',
			'search'
		];
		if(empty($username)) {
			throw new \Exception\InvalidUsername("Username is empty");
		} else if (strlen($username) > 16) {
			throw new \Exception\InvalidUsername("Username is too long / max: 16 characters");
		} else if (!preg_match("/^[A-Za-z0-9_]{1,16}$/", $username)) {
			throw new \Exception\InvalidUsername("Username cannot have special characters / just letters, numbers and underscore");
		} else if (!preg_match("/^[A-Za-z]{1}/", $username)) {
			throw new \Exception\InvalidUsername("Username must begins with a letter");
		} else if (in_array(strtolower($username), $reservedWords)) {
			throw new \Exception\InvalidUsername($username." is a reserved word");
		} else if ((new \Dao\User())->checkUsernameExists($username)) {
			if(session_id()!='' && strtolower($_SESSION['user']->getUsername()) == strtolower($username)) {
				//using the same username
			} else {
				throw new \Exception\InvalidUsername("Username already being used");
			}
		}
	}

	function validateEmail(string $email) {
		if(empty($email)) {
			throw new \Exception\InvalidEmail("Email is empty");
		} else if (strlen($email) > 128) {
			throw new \Exception\InvalidEmail("Email is too long / max: 128 characters");
		//} else if (!preg_match("/^[A-Za-z0-9_@.]{1,128}$/", $email)) {
		//	return "email cannot have special characters</br> just letters, numbers";
	
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new \Exception\InvalidEmail("It must be an email");
		} else if ((new \Dao\User())->checkEmailExists($email)) {
			if(session_id()!='' && strtolower($_SESSION['user']->getEmail()) == strtolower($email)) {
				//using the same email
			} else {
				throw new \Exception\InvalidEmail("Email already being used");
			}
			
		}
	}

	function validatePassword(string $password) {
		if(empty($password)) {
			throw new \Exception\InvalidPassword("Password is empty");
		} else if (strlen($password) > 16) {
			throw new \Exception\InvalidPassword("Password is too long / max: 16 characters");
		} else if (strlen($password) < 4) {
			throw new \Exception\InvalidPassword("Password is too short / min: 4 characters");
		}
	}

}