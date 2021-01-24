<?php

namespace Model;

class Post {
    private $id;
    private $text;
    private $picture;
    private $createdAt;
    private $userId;

    function __construct(int $id = null, string $text = null, string $picture = null, string $createdAt = null, int $userId = null) {
        $this->id = $id;
        $this->text = $text;
        $this->picture = $picture;
        $this->createdAt = $createdAt;
        $this->userId = $userId;
    }

    function getId() {
        return $this->id;
    }
    function getText() {
        return $this->text;
    }
    function getPicture() {
        return $this->picture;
    }
    function getCreatedAt() {
        return $this->createdAt;
    }
    function getUserId() {
        return $this->userId;
    }   
}