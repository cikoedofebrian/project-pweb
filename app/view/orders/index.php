<?php

require_once '../../init.php';
Session::init();

$data = new Login();

if (!Session::exists('email')) {
    $data->Index();
    exit();
}

$data = $data->findRowfromSession();
$data = mysqli_fetch_array($data);

if (isset($_POST['submit'])) {
    $orderobj = new Orders();
    $orderobj->AddOrder($_POST['weight'], $_POST['Duration'], $_POST['Item'], $_POST['Payment'], $data['user_id']);
}
?>
<style>
    .w-screen {
        width: 100vw;
    }

    .h-screen {
        height: 100vh;
    }

    .h-full {
        height: 100%
    }

    .w-full {
        width: 100%;
    }
</style>
<?php 
require_once("../template/header.php");
?>


<body class="w-screen h-screen">
<?php require_once("../template/navbar.php"); ?>
    <section class="w-full h-full order" id="order" style="padding-top: 20vh;">

        <h1 class="heading"> order <span>form</span> </h1>

        <form action="" method="post">

            <div class="inputBox">
                <div class="input">
                    <span>first name</span>
                    <input type="text" value="<?= $data['name'] ?>" disabled placeholder="First name">
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>service</span>
                    <select name="Item" id="Item">
                        <option value="1">Clothes</option>
                        <option value="2">Shoes</option>
                        <option value="3">Helmet</option>
                    </select>
                </div>
                <div class="input">
                    <span>service</span>
                    <select name="Payment" id="Payment">
                        <option value="1">Cash</option>
                        <option value="2">E-Wallet</option>
                    </select>
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>Weight (kg)</span>
                    <input type="number" name="weight" placeholder="(kg)">
                </div>
                <div class="input">
                    <span>durasi</span>
                    <select name="Duration" id="Duration">
                        <option value="1">Kilat</option>
                        <option value="2">Biasa</option>
                    </select>
                </div>
            </div>


            <div style="display: flex; justify-content: center;">
                <input type="submit" name="submit" value="order now" class="btn">
            </div>

        </form>

    </section>

</body>

<!-- </html> -->