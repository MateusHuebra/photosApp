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

}