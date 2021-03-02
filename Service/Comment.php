<?php

namespace Service;

class Comment {

    function validateComment($comment) {
        if(empty($comment)) {
            throw new \Exception\InvalidComment(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.yourCommentIsEmpty'));
        } else if (strlen($comment) > 255) {
            throw new \Exception\InvalidComment(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.yourCommentIsTooLong'));
        } else if (preg_match("/^[ ]/", $comment) || preg_match("/[ ]$/", $comment)) {
            throw new \Exception\InvalidComment(call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'toasts.yourCommentCannotStartOrEndWithASpace'));
        }

    }
}