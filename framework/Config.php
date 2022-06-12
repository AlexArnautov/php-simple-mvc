<?php

namespace framework;

class Config
{

    private static $config = [];


    public static function get($key)
    {
        return self::$config[$key];
    }


    public static function set($key, $value): void
    {
        self::$config[$key] = $value;
    }

}