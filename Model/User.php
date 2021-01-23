<?php

namespace Model;

class User {
	private $id;
	private $username;
	private $name;
	private $email;
	private $pass;
	private $photo;

	function __construct(int $id = null, string $username = null, string $name = null, string $email = null, string $pass = null, string $photo = null) {
		$this->id = $id;
		$this->username = $username;
		$this->name = $name;
		$this->email = $email;
		$this->pass = $pass;
		$this->photo = $photo;
	}

	function getId() {
		return $this->id;
	}
	
	function getUsername() {
		return $this->username;
	}
	
	function getName() {
		return $this->name;
	}
	
	function getEmail() {
		return $this->email;
	}
	
	function getPass() {
		return $this->pass;
	}
	
	function getPhoto() {
		return $this->photo;
	}
}