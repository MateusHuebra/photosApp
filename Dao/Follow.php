<?php

namespace Dao;

class Follow extends Dao {

    function getById(int $userId, int $followsId) {
        $query = "SELECT userId FROM follow WHERE UserId = ".$userId." and followsId = ".$followsId;
        $connection = $this->getConnection();
		return $connection->selectOne($query) != false;
    }

    function get(int $userId, string $action) {

        $query = "SELECT id, username, photo
                FROM follow JOIN user on follow.".($action=='followers' ? "userId" : "followsId")." = user.id
                WHERE ". ($action=='followers' ? "followsId" : "userId") ."= ".$userId."
                ORDER BY (username = '".$_SESSION['user']->getUsername()."') desc, username asc";
        $connection = $this->getConnection();
		return $connection->selectAll($query);
    }

    function getFollowersCount(int $userId) {
        $query = "SELECT count(userId) as 'count' FROM follow WHERE followsId = ".$userId;
        $connection = $this->getConnection();
		$result = $connection->selectAll($query);
        return $result[0]['count'];
    }

    function getFollowingCount(int $userId) {
        $query = "SELECT count(followsId) as 'count' FROM follow WHERE userId = ".$userId;
        $connection = $this->getConnection();
		$result = $connection->selectAll($query);
        return $result[0]['count'];
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