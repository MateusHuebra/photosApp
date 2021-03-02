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
			'search',
			'language'
		];
		if(empty($username)) {
			throw new \Exception\InvalidUsername(\Service\Translation::get('toasts.usernameIsEmpty'));
		} else if (strlen($username) > 16) {
			throw new \Exception\InvalidUsername(\Service\Translation::get('toasts.usernameIsTooLong'));
		} else if (!preg_match("/^[A-Za-z0-9_]{1,16}$/", $username)) {
			throw new \Exception\InvalidUsername(\Service\Translation::get('toasts.usernameCannotHaveSpecialCharacters'));
		} else if (!preg_match("/^[A-Za-z]{1}/", $username)) {
			throw new \Exception\InvalidUsername(\Service\Translation::get('toasts.usernameMustBeginsWithALetter'));
		} else if (in_array(strtolower($username), $reservedWords)) {
			throw new \Exception\InvalidUsername($username.' '.\Service\Translation::get('toasts.isAReservedWord'));
		} else if ((new \Dao\User())->checkUsernameExists($username)) {
			if(session_id()!='' && strtolower($_SESSION['user']->getUsername()) == strtolower($username)) {
				//using the same username
			} else {
				throw new \Exception\InvalidUsername(\Service\Translation::get('toasts.usernameAlreadyTaken'));
			}
		}
	}

	function validateEmail(string $email) {
		if(empty($email)) {
			throw new \Exception\InvalidEmail(\Service\Translation::get('toasts.emailIsEmpty'));
		} else if (strlen($email) > 128) {
			throw new \Exception\InvalidEmail(\Service\Translation::get('toasts.emailIsTooLong'));
		//} else if (!preg_match("/^[A-Za-z0-9_@.]{1,128}$/", $email)) {
		//	return "email cannot have special characters</br> just letters, numbers";
	
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new \Exception\InvalidEmail(\Service\Translation::get('toasts.itMustBeAnEmail'));
		} else if ((new \Dao\User())->checkEmailExists($email)) {
			if(session_id()!='' && strtolower($_SESSION['user']->getEmail()) == strtolower($email)) {
				//using the same email
			} else {
				throw new \Exception\InvalidEmail(\Service\Translation::get('toasts.emailAlreadyBeingUsed'));
			}
			
		}
	}

	function validatePassword(string $password) {
		if(empty($password)) {
			throw new \Exception\InvalidPassword(\Service\Translation::get('toasts.passwordIsEmpty'));
		} else if (strlen($password) > 16) {
			throw new \Exception\InvalidPassword(\Service\Translation::get('toasts.passwordIsTooLong'));
		} else if (strlen($password) < 4) {
			throw new \Exception\InvalidPassword(\Service\Translation::get('toasts.passwordIsTooShort'));
		}
	}

}