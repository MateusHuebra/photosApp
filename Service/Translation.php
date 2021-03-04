<?php

namespace Service;

class Translation {

    static function get(string $key) {
        $language = $_SESSION['lang'];
        while(call_user_func(array('\Service\Language\\'.$language, 'get'), $key)==false) {
            $testedLanguages[] = $language;
            $language = call_user_func(array('\Service\Language\\'.$language, 'get'), 'backupLanguage');
            if(in_array($language, $testedLanguages)) {
                $language = 'English';
            }
        }
        echo call_user_func(array('\Service\Language\\'.$language, 'get'), $key);
    }

    static function getAll() {
        return call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'getAll'));
    }

    static function echo(string $key) {
        echo self::get($key);
    }

    static function getFromSpecific(string $language,string $key) {
        return call_user_func(array('\Service\Language\\'.$language, 'get'), $key);
    }

}