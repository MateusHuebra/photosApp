<?php

namespace Dao;

class Follow extends Dao {

    function getById(int $userId, int $followsId) {
        $query = "SELECT userId FROM follow WHERE UserId = ".$userId." and followsId = ".$followsId;
        $connection = $this->getConnection();
		return $connection->selectOne($query) != false;
    }

    function get(int $userId) {
        $query = "SELECT followsId FROM follow WHERE userId = ".$userId;
        $connection = $this->getConnection();
		return $connection->selectAll($query);
    }

    function set(int $userId, int $followsId) {
        $query = "INSERT INTO follow VALUES(".$userId.", ".$followsId.")";
        $connection = $this->getConnection();
        $connection->query($query);
    }

    function unset(int $userId, int $followsId) {
        $query = "DELETE FROM follow WHERE userId = ".$userId." and followsId = ".$followsId;
        $connection = $this->getConnection();
        $connection->query($query);
    }

}