<?php

namespace Service\Language;

abstract class Methods {

    const STRINGS = [];

    static function get(string $key) {
        $keys = explode('.', $key);
        $strings = static::STRINGS;
        foreach ($keys as $key) {
            if(array_key_exists($key, $strings)) {
                $strings = $strings[$key];
            } else {
                return false;
            }
        }
        return $strings;
    }

    static function getAll() {
        return static::STRINGS;
    }

}