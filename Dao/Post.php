<?php

namespace Dao;

class Post extends Dao {

    const postsLoadedAtATime = 3;

    function get(int $lastPostId = 0) : array {
        $query = "SELECT id, text, picture, DATE_FORMAT(createdAt, '%d/%m/%Y %H:%i') as createdAt, userId
                FROM post ";

        if($lastPostId != 0) {
            $query .= "WHERE id < {$lastPostId} ";
        }
        $query .= "ORDER BY id desc limit ".Post::postsLoadedAtATime;
        
        $connection = $this->getConnection();
        $results = $connection->selectAll($query);
        $posts = [];
        foreach ($results as $result) {
            $posts[] = new \Model\Post(
                $result['id'],
                $result['text'],
                $result['picture'],
                $result['createdAt'],
                $result['userId']);
        }
        return $posts;
    }

    function getFromFollows(int $lastPostId = 0, int $userId) : array {
        $query = "SELECT distinct id, text, picture, DATE_FORMAT(createdAt, '%d/%m/%Y %H:%i') as createdAt, post.userId
                FROM post LEFT JOIN follow on post.userId = follow.followsId
                WHERE (follow.userId = ".$userId." or post.userId = ".$_SESSION['user']->getId().")";

        if($lastPostId != 0) {
            $query .= " and id < {$lastPostId}";
        }
        $query .= " ORDER BY id desc limit ".Post::postsLoadedAtATime;
        //echo $query;
        $connection = $this->getConnection();
        $results = $connection->selectAll($query);
        $posts = [];
        foreach ($results as $result) {
            $posts[] = new \Model\Post(
                $result['id'],
                $result['text'],
                $result['picture'],
                $result['createdAt'],
                $result['userId']);
        }
        return $posts;
    }

    function getById(int $userId, int $lastPostId = 0) : array {
        $query = "SELECT id, text, picture, DATE_FORMAT(createdAt, '%d/%m/%Y %H:%i') as createdAt, userId FROM post
                WHERE userId = ".$userId;
        if($lastPostId != 0) {
            $query .= " and id < {$lastPostId}";
        }
        $query .=  " ORDER BY id desc limit ".Post::postsLoadedAtATime;
        
        $connection = $this->getConnection();
        $results = $connection->selectAll($query);
        $posts = [];
        foreach ($results as $result) {
            $posts[] = new \Model\Post(
                $result['id'],
                $result['text'],
                $result['picture'],
                $result['createdAt'],
                $result['userId']);
        }
        return $posts;
    }

    function getCountById(int $userId) {
        $query = "SELECT count(id) as 'count' FROM post
                WHERE userId = ".$userId;
        $connection = $this->getConnection();
        $result = $connection->selectAll($query);
        return $result[0]['count'];
    }

    function getOne(int $id, int $pic) {
        $query = "SELECT id, text, picture, DATE_FORMAT(createdAt, '%d/%m/%Y %H:%i') as createdAt, userId
                FROM post
                WHERE id = ".$id;
        $connection = $this->getConnection();
        $result = $connection->selectOne($query);
        if($result==false || explode('.',$result['picture'])[0] != $pic){
            return false;
        }
        $post = new \Model\Post(
            $result['id'],
            $result['text'],
            $result['picture'],
            $result['createdAt'],
            $result['userId']);
        return $post;
    }

    function getPostUserId(int $id) {
        $query = "SELECT userId
                FROM post
                WHERE id = ".$id;
        $connection = $this->getConnection();
        return $connection->selectOne($query)['userId'];
    }

    function save(\Model\Post $post) {
        $query = "INSERT INTO post (id, text, picture, userId)
                VALUES (".$this->getIntOrNullForSQL($post->getId()).", "
                .$this->getStringOrNullForSQL($post->getText()).", "
                .$this->getStringOrNullForSQL($post->getPicture()).", "
                .$this->getStringOrNullForSQL($post->getUserId()).")
                ON DUPLICATE KEY UPDATE
						text = ".$this->getStringOrNullForSQL($post->getText());
		$connection = $this->getConnection();
		$connection->query($query);
		//echo $query;
		//die();
    }

    function delete(int $postId) {
        $query = "DELETE FROM post WHERE id = ".$postId;
        $connection = $this->getConnection();
        $connection->query($query);
    }

}