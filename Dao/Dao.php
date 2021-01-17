<?php

namespace Dao;

abstract class Dao {
	
	protected function getConnection() : Connection {
		global $connection;
		return $connection;
	}
}