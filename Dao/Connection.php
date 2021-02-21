<?php

namespace Dao;

use Service\Settings;

class Connection {
	private $connection;

	function __construct() {
		$this->connection = new \PDO('mysql:host='.SETTINGS['database']['host'].';dbname='.SETTINGS['database']['dbname'], SETTINGS['database']['username'], SETTINGS['database']['password']);
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