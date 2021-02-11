<?php

namespace Dao;

class Comment extends Dao {

    function get(int $postId, $lastCommentId = null, $recentCommentId = null) {
        $query = "SELECT id, userId, text, createdAt FROM comment WHERE postId = ".$postId;
        if($lastCommentId) {
            $query.= " and id < ".$lastCommentId;
        } else if ($recentCommentId) {
            $query.= " and id > ".$recentCommentId;
        }
        $query.=" ORDER BY createdAt desc limit 3";
        $connection = $this->getConnection();
		$results = $connection->selectAll($query);
        $comments = [];
        foreach ($results as $result) {
            $comments[] = new \Model\Comment(
                $result['id'],
                $postId,
                $result['userId'],
                $result['text'],
                $result['createdAt']);
        }
        return $comments;
    }

    function set(int $postId, int $userId, string $text) {
        $query = "INSERT INTO comment (postId, userId, text)
                VALUES ({$postId}, {$userId}, '{$text}')";
		$connection = $this->getConnection();
		$connection->query($query);
    }

    function getCount(int $postId) {
        $query = "SELECT count(id) as 'count' FROM comment WHERE postId = ".$postId;
        $connection = $this->getConnection();
		return $connection->selectAll($query)[0]['count'];
    }
}