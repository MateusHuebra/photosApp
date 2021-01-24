<?php

namespace Dao;

class Post extends Dao {

    function get() : array {
        $query = "SELECT post.*, user.photo, user.username FROM post
                JOIN user ON post.userId = user.Id
                ORDER BY createdAt desc
                limit 10";
        $connection = $this->getConnection();
        return $connection->selectAll($query); 
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
}