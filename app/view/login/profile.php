<?php 
require_once '../../init.php';
require_once("../template/header.php");
$profile = new Login();
$data = mysqli_fetch_array($profile->findRowfromSession());
if (isset($_GET['cont'])){
    if ($_GET['cont']=='logout'){
        $profile->Logout();
    }
}
?>

<body>
    <?php require_once("../template/navbar.php"); ?>


    <section class="order" id="profile" style="margin-top: 8vh;">

        <h1 class="heading"> your <span>profile</span> </h1>

        <form action="">
            <div class="inputBox">
                <div class="input">
                    <span>Name</span>
                    <input type="text" placeholder="Name" disabled value="<?= $data["name"] ?>">
                </div>
                <div class="input">
                    <span>Email</span>
                    <input type="email" placeholder="Email" disabled value="<?= $data["email"] ?>">
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>Address</span>
                    <input type="text" placeholder="Address" disabled value="<?= $data["address"] ?>">
                </div>
            </div>
            <a href="?cont=logout" id="logout" type="button" class="btn btn-primary" style="margin:10px">Log Out</a>

        </form>
    </section>
    <script>
        $("#logout").click(e => {
            if (!confirm("Anda yakin ingin logout?")) {
                return false;
            }
        });
        let subMenu = document.getElementById("subMenu");
    </script>
</body>