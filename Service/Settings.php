<?php

namespace Service;

class Settings {
    
    const SETTINGS = [
        'database' => [
            'host' => 'localhost',
            'dbname' => 'photosapp',
            'username' => 'root',
            'password' => 'Abc_12345'
        ]
    ];

    static function get(string $key) {
        $keys = explode('.', $key);
        $settings = self::SETTINGS;
        foreach ($keys as $key) {
            $settings = $settings[$key];
        }
        return $settings;
    }

}