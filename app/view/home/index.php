<?php
require_once("../template/header.php");
?>

<body>
    <?php require_once("../template/navbar.php"); ?>

    <section class="home" id="home">

        <div class="content">
            <h3>fresh and <span>clean</span> laundry for you</h3>
            <p>Gapunya waktu untuk ngelakuin laundry? Laundry disini aja!.</p>
            <a href="#" class="btn">shop now</a>
        </div>

    </section>

    <section class="services" id="services">

        <h1 class="heading"> our <span>service</span> </h1>

        <div class="box-containers">

            <div class="boxs">
                <img src="../../../public/images/shirt.jpg" alt="">
                <h3>clothes</h3>
                <p>Kerjaan aman, baju aman!</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="boxs">
                <img src="../../../public/images/shoes.jpg" alt="">
                <h3>shoes</h3>
                <p>Sepatumu kotor dan gatau tempat nyucinya? Disini bahkan bisa putihin sepatu lho!</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="boxs">
                <img src="../../../public/images/helmet.jpg" alt="">
                <h3>helmet</h3>
                <p>Helm kamu bau, tinggalin disini aja! Pasti besok wangi!</p>
                <a href="#" class="btn">read more</a>
            </div>

        </div>

    </section>
</body>
<?php 
require_once("../template/footer.php");
?>