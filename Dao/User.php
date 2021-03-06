<?php

namespace Dao;

class User extends Dao {
	
	function getByUsernameOrEmailAndPassword(string $usernameOrEmail, string $password) {
		$query = 'select * from user where (username = "'.$usernameOrEmail.'" or email = "'.$usernameOrEmail.'") and pass = "'.md5($password).'"';
		$connection = $this->getConnection();
		$result = $connection->selectOne($query);
		if($result==false) {
			throw new \Exception\InvalidCredentials(\Service\Translation::get('toasts.invalidCredentials'));
		}
		return new \Model\User($result['id'], $result['username'], $result['name'], $result['email'], null, $result['photo'], $result['cover']);
	}

	function getByEmail(string $email) {
		$query = 'select * from user where email = "'.$email.'"';
		$connection = $this->getConnection();
		$result = $connection->selectOne($query);
		return new \Model\User($result['id'], $result['username'], $result['name'], $result['email'], null, $result['photo'], $result['cover']);
	}

	function getByUsername(string $username) {
		$query = 'select * from user where username = "'.$username.'"';
		$connection = $this->getConnection();
		$result = $connection->selectOne($query);
		return new \Model\User($result['id'], $result['username'], $result['name'], $result['email'], null, $result['photo'], $result['cover']);
	}

	function getById(int $id) {
		$query = 'select * from user where id = '.$id;
		$connection = $this->getConnection();
		$result = $connection->selectOne($query);
		return new \Model\User($result['id'], $result['username'], $result['name'], $result['email'], null, $result['photo'], $result['cover']);
	}

	function checkEmailExists(string $email) : bool {
		$query = 'select email from user where email = "'.$email.'"';
		$connection = $this->getConnection();
		return $connection->selectOne($query) != false;
	}

	function checkUsernameExists(string $username) : bool {
		$query = 'select username from user where username = "'.$username.'"';
		$connection = $this->getConnection();
		return $connection->selectOne($query) != false;
	}

	function updateInfo(\Model\User $user) {
		$query = 'UPDATE user SET username = "'.$user->getUsername().'",
					email = "'.$user->getEmail().'"
					WHERE id = '.$user->getId();
		$connection = $this->getConnection();
		$connection->query($query);

		$query = 'SELECT * FROM user WHERE id = '.$user->getId();
		$result = $connection->selectOne($query);
		return new \Model\User($result['id'], $result['username'], $result['name'], $result['email'], null, $result['photo'], $result['cover']);
	}

	function save(\Model\User $user) {
		$query = "INSERT INTO user (id, username, name, email, pass)
					VALUES (".$this->getIntOrNullForSQL($user->getId()).", "
					.$this->getStringOrNullForSQL($user->getUsername()).", "
					.$this->getStringOrNullForSQL($user->getName()).", "
					.$this->getStringOrNullForSQL($user->getEmail()).", "
					.$this->getStringOrNullForSQL(md5($user->getPass())).")
					ON DUPLICATE KEY UPDATE
						username = ".$this->getStringOrNullForSQL($user->getUsername()).",
						name = ".$this->getStringOrNullForSQL($user->getName()).",
						email = ".$this->getStringOrNullForSQL($user->getEmail())."";
		if(empty($user->getPass())) {
			$query.= ", pass = ".$this->getStringOrNullForSQL(md5($user->getPass()));
		}
		$connection = $this->getConnection();
		$connection->query($query);
		//echo $query;
		//die();
	}

	function savePhoto(string $photo, int $id) {
		$query = 'UPDATE user SET photo = "'.$photo.'" WHERE id = '.$id;
		$connection = $this->getConnection();
		$connection->query($query);
	}

	function search(string $search) {
		$query = "SELECT * FROM user
		WHERE username LIKE '{$search}%' or name LIKE '{$search}%'
		ORDER BY username desc limit 5";
		$connection = $this->getConnection();
		$results = $connection->selectAll($query);
		foreach ($results as $result) {
            $users[] = new \Model\User(
				$result['id'],
				$result['username'],
				$result['name'],
				$result['email'],
				null,
				$result['photo'],
				null);
        }
		//echo $query;
		return $users;
	}

}