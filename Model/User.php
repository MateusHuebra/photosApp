<?php

namespace Model;

class User {
	private $id;
	private $username;
	private $name;
	private $email;
	private $pass;
	private $photo;
	private $cover;

	function __construct(int $id = null, string $username = null, string $name = null, string $email = null, string $pass = null, string $photo = null, string $cover = null) {
		$this->id = $id;
		$this->username = $username;
		$this->name = $name;
		$this->email = $email;
		$this->pass = $pass;
		$this->photo = $photo;
		$this->cover = $cover;
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
	function getCover() {
		return $this->cover;
	}

	function getProfilePicture() {
		if($this->getPhoto()){
			return '/photosApp/images/database/'.$this->getId().'/'.$this->getPhoto();
		} else {
			return '/photosApp/images/profile.png';
		}
	}

	function getCoverPicture() {
		if($this->getCover()){
			return '/photosApp/images/database/'.$this->getId().'/'.$this->getCover();
		} else {
			return '/photosApp/images/cover.png';
		}
	}

}