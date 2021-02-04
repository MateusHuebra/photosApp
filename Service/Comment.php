<?php

namespace Service;

class Comment {

    function validateComment($comment) {
        if(empty($comment)) {
            throw new \Exception\InvalidComment("Your comment is empty");
        } else if (strlen($comment) > 255) {
            throw new \Exception\InvalidComment("Your comment is too long / max: 255 characters");
        } else if (preg_match("/^[ ]/", $comment) || preg_match("/[ ]$/", $comment)) {
            throw new \Exception\InvalidComment("Your comment cannot start or end with a space");
        }

    }
}