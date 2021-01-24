<?php

namespace Dao;

class Post extends Dao {

    function get() : array {
        $query = "SELECT * FROM post
                ORDER BY createdAt desc
                limit 10";
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