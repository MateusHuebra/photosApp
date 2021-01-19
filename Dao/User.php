<?php

namespace Dao;

class User extends Dao {
	
	function getByUsernameOrEmailAndPassword(string $usernameOrEmail, string $password) {
		$query = 'select * from user where (username = "'.$usernameOrEmail.'" or email = "'.$usernameOrEmail.'") and pass = "'.md5($password).'"';
		$connection = $this->getConnection();
		$result = $connection->selectOne($query);
		if($result==false) {
			throw new \Exception\InvalidCredentials("Invalid credentials");
		}
		return new \Model\User($result['id'], $result['username'], $result['name'], $result['email'], null, $result['photo']);
	}

	function getByEmail(string $email) {
		$query = 'select * from user where email = "'.$usernameOrEmail.'"';
		$connection = $this->getConnection();
		$result = $connection->selectOne($query);
		return new \Model\User($result['id'], $result['username'], $result['name'], $result['email'], null, $result['photo']);
	}

	function checkEmailExists(string $email) : bool {
		$query = 'select email from user where email = "'.$email.'"';
		$connection = $this->getConnection();
		return $connection->selectOne($query) != false;
	}

	function save(\Model\User $user) {
		$query = "INSERT INTO user (id, username, name, email, pass)
					VALUES (".$user->getId().", '".$user->getUsername()."', '".$user->getName()."', '".$user->getEmail()."', '".md5($user->getPass())."')
					ON DUPLICATE KEY UPDATE
						id = ".$user->getId().",
						username = '".$user->getUsername()."',
						name = '".$user->getName()."',
						email = '".$user->getEmail()."'";
		if(empty($user->getPass())) {
			$query.= ", pass = '".md5($user->getPass())."'";
		}
		
		$connection = $this->getConnection();
		$connection->query($query);
		//echo $query;
	}
}