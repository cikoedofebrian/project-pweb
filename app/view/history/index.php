<?php
require_once '../../init.php';
$data = new Orders();
$data = $data->getDataTable();
require_once("../template/header.php");
?>

<body>
    <?php require_once("../template/navbar.php"); ?>

        <?php
        if (mysqli_num_rows($data)<=0){
            ?>
            <center>    
                <div class="jumbotron jumbotron-fluid" style="margin-top:10%;">
                    <div class="container-fluid">
                    <h1 class="display" style="font-size: 8em;">Histori Kosong</h1>
                <p class="lead" style="font-size: 2em;" >Lakukan order untuk bisa melihat histori.</p>
            </div>
            </center>
            <?php
        }else{
        while ($row = $data->fetch_assoc()) {
        ?>
            <div class="container2">
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
        </div>
        <?php
        }
    }
        ?>
    </div>
</body>