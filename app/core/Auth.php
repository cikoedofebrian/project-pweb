<?php

class Auth
{
    public static function checkIfNull($username, $password)
    {
        if ($username == null || $password == null) {
            var_dump("cant be null");
        }
    }
}
