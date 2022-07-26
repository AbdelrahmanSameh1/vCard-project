<?php

namespace itrax\core;




class registry
{

    private static $object = [];


    public static function set($key, $value)
    {
        static::$object[$key] = $value;      // late static bindings
    }

    public static function get($key)
    {
        return static::$object[$key];
    }


    public static function has($key)
    {
        return (array_key_exists($key, static::$object));
    }
}
