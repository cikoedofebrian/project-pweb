<?php
require_once '../app/core/Cookie.php';
require_once '../app/core/Session.php';

if (Cookie::exists('email')) {
    session_start();
    Session::put('email', $_COOKIE['email']);
}

Header("Location: ../app/view/index/index.php");
