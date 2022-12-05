<?php
require_once '../app/init.php';

if (Cookie::exists('email')) {
    session_start();

    Session::put('email', $_COOKIE['email']);
}

$App = new App();
