<?php

namespace Dao;

class Like extends Dao {

    function get(int $postId, int $userId) : bool {
        $query = "SELECT postId FROM `like` WHERE postId = ".$postId." and userId = ".$userId;
        $connection = $this->getConnection();
		return $connection->selectOne($query) != false;
    }

    function getLikes(int $postId) {
        $query = "SELECT id, username, photo FROM `like` JOIN user on `like`.userId = user.id WHERE postId = ".$postId;
        $connection = $this->getConnection();
		return $connection->selectAll($query);
    }

    function getCount(int $postId) : int {
        $query = "SELECT count(*) as count FROM `like` WHERE postId = ".$postId;
        $connection = $this->getConnection();
		return $connection->selectAll($query)[0]['count'];
    }

    function set(int $postId, int $userId) {
        $query = "INSERT INTO `like` VALUES(".$postId.", ".$userId.")";
        $connection = $this->getConnection();
        $connection->query($query);
    }

    function unset(int $postId, int $userId) {
        $query = "DELETE FROM `like` WHERE postId = ".$postId." and userId = ".$userId;
        $connection = $this->getConnection();
        $connection->query($query);
    }
    
    function deleteAll(int $postId) {
        $query = "DELETE FROM `like` WHERE postId = ".$postId;
        $connection = $this->getConnection();
        $connection->query($query);
    }

}