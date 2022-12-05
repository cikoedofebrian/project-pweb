<?php

Session::init();
if (Session::exists('email')) {
    header("Location: ../login/index");
    die();
}
?>

<body>
    <header class="header">

        <a href="../home/index" class="logo"> <i class="fas fa-shopping-basket"></i> Laundryin </a>

        <nav class="navbar">
            <a href="../home/index">home</a>
            <a href="../orders/history">history</a>
            <a href="../orders/index">orders</a>
            <a href="../login/index">account</a>
        </nav>
    </header>
    <div class="container2">
        <?php
        while ($row = $data->fetch_assoc()) {
        ?>
            <div class="left">
                <div class="info-box">
                    <div class="receipt">
                        Name <br> <span> <?= $row['name'] ?> </span>
                    </div>
                    <div class="entry">
                        <p>Price <br> <span>Rp. <?php echo $row['price'] * $row['weight']; ?> </span></p>
                    </div>
                    <div class="entry">
                        <p>Date: <br> <span> <?= $row['date_in'] ?></span></p>
                    </div>
                    <div class="entry">
                        <p>Category: <br> <span><?= $row['category_name'] ?></span></p>
                    </div>
                    <div class="entry">
                        <p>Duration: <br> <span><?= $row['duration_name'] ?></span></p>
                    </div>
                    <div class="entry">

                        <p>Status Pemesanan: <br> <span></span></p>
                    </div>

                    <div class="navigation2" style="margin:10px">
                        <a href="" class="m-5 " style="color: #fefefe; font-size:2em">Proccessed</a>
                        <i class="bi bi-alarm fa-2x"></i>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</body>