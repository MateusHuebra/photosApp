<?php

namespace Dao;

class Connection {
	private $connection;

	function __construct() {
		$this->connection = new \PDO('mysql:host=localhost;dbname=photosapp', 'root', 'Abc_12345');
	}

	function selectOne(string $query) {
		$stmt = $this->connection->query($query);
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	function selectAll(string $query) {
		$stmt = $this->connection->query($query);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	function query(string $query) {
		$this->connection->query($query);
	}
}