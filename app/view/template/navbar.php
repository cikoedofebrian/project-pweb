<?php 
    require_once '../../init.php';
    if(isset($_GET['cont'])){
        if($_GET['cont']=='home'){
            $home = new Home();
            $home->Index();
            die();
        }else if($_GET['cont']=='history'){
            $history = new Orders();
            $history->History();
            die();
        }else if ($_GET['cont']=='login'){
            $login = new Login();
            $login->Index();
            die();
        }else if ($_GET['cont'] =='orders'){
            $orders = new Orders();
            $orders->Index();
        }
    }
?>

<header class="header">

<a href="?cont=home" class="logo"> <i class="fas fa-shopping-basket"></i> Laundryin </a>

<nav class="navbar">
    <a href="?cont=home">home</a>
    <a href="?cont=history">history</a>
    <a href="?cont=orders">orders</a>
    <a href="?cont=login">account</a>
</nav>
</header>