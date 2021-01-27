<?php

namespace Model;

class Like {
    private $postId;
    private $userId;

    function __construct(int $postId = null, int $userId = null) {
        $this->postId = $postId;
        $this->userId = $userId;
    }

    function getPostId() {
        return $this->postId;
    }
    function getUserId() {
        return $this->userId;
    }
}