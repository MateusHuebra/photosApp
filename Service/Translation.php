<?php

namespace Service;

class Translation {

    static function get(string $key) {
        return call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), $key);
    }

    static function getAll() {
        return call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'getAll'));
    }

    static function echo(string $key) {
        echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), $key);
    }

    static function getFromSpecific(string $language,string $key) {
        return call_user_func(array('\Service\Language\\'.$language, 'get'), $key);
    }

}