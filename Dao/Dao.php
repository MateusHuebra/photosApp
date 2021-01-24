<?php

namespace Dao;

abstract class Dao {
	
	protected function getConnection() : Connection {
		global $connection;
		return $connection;
	}

	function getIntOrNullForSQL($int) {
		if(is_null($int)) {
			return 'null';
		}
		return $int;
	}

	function getStringOrNullForSQL($string) : string {
		if(is_null($string)) {
			return 'null';
		}
		return "'".$string."'";
	}
}