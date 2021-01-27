<?php

namespace Model;

class Comment {
    private $id;
    private $postId;
    private $userId;
    private $text;
    private $createdAt;

    function __construct(int $id = null, int $postId = null, int $userId = null, string $text = null, string $createdAt = null) {
        $this->id = $id;
        $this->postId = $postId;
        $this->userId = $userId;
        $this->text = $text;
        $this->createdAt = $createdAt;
    }

    function getId() {
        return $this->id;
    }
    function getPostId() {
        return $this->postId;
    }
    function getUserId() {
        return $this->userId;
    }
    function getText() {
        return $this->text;
    }
    function getCreatedAt() {
        return $this->createdAt;
    }
    
}