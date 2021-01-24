<?php

namespace Dao;

class Post extends Dao {

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