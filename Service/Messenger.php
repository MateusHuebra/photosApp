<?php

namespace Service;

class Messenger {

	function __construct() {
		if(session_id() == '') {
			session_start();
		}
	}
	
	function set(string $index, $message) {
		$_SESSION[$index] = $message;
	}

	function get(string $index, bool $clean = true) {
		$message = $_SESSION[$index];
		if($clean) {
			$_SESSION[$index] = null;
		}
		return $message;
	}

	function has(string $index) : bool {
		return $_SESSION[$index] !== null;
	}
}