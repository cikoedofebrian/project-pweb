

<?php
require_once "../../controller/home.php";
if(isset($_GET['cont'])){
    if($_GET['cont'] == 'home'){
        $home = new Home();
        $home->Index();
        die();
    }
}


?>

<body>
    <a href="?cont=home">Go to app</a>
</body>