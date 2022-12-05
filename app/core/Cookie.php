<?php

class Cookie
{


    public static function delete($key)
    {
        self::put($key, '', time() - 1);
    }

    public static function exists($key): bool
    {
        return isset($_COOKIE[$key]);
    }


    public static function get($key): string
    {
        return $_COOKIE[$key];
    }

    public static function put($key, $value): bool
    {
        return setcookie($key, $value, time() + 455000, '/');
    }
}
