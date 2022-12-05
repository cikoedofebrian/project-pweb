<?php


class Session

{

    public static function init()
    {
        // If no session exist, start the session.
        if (session_id() === '') {
            session_start();
        }
    }

    public static function destroy()
    {
        session_destroy();
    }


    public static function exists($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key)
    {
        if (self::exists($key)) {
            return $_SESSION[$key];
        }
    }


    public static function put($key, $value)
    {
        return ($_SESSION[$key] = $value);
    }

    public static function delete($key): bool
    {
        if (self::exists($key)) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
}
