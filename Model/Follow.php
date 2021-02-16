<?php

namespace Model;

class Follow {
    private $userId;
    private $followsId;

    function __construct(int $userId = null, int $followsId = null) {
        $this->userId = $userId;
        $this->followsId = $followsId;
    }

    function getUserId() {
        return $this->userId;
    }
    function getFollowsId() {
        return $this->followsId;
    }
}