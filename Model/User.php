<?php

namespace Model;

class User {
	private $id;
	private $username;
	private $name;
	private $email;
	private $pass;

	function __construct(int $id, string $username, string $name, string $email, string $pass = null) {
		$this->id = $id;
		$this->username = $username;
		$this->name = $name;
		$this->email = $email;
		$this->pass = $pass;
	}

	function getId() : int {
		return $this->id;
	}
	
	function getUsername() : string {
		return $this->username;
	}
	
	function getName() : string {
		return $this->name;
	}
	
	function getEmail() : string {
		return $this->email;
	}
	
	function getPass() : string {
		return $this->pass;
	}
	
}