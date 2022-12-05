<?php

Session::init();
if (!Session::exists('email')) {
    header("Location: ../login/index");
    exit();
}





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

<body class="w-screen h-screen">
    <header class="header">

        <a href="../home/index" class="logo"> <i class="fas fa-shopping-basket"></i> Laundryin </a>

        <nav class="navbar">
            <a href="../home/index">home</a>
            <a href="../orders/history">history</a>
            <a href="../orders/index">orders</a>
            <a href="../login/index">account</a>
        </nav>
    </header>
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