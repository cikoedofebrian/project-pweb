<?php
if (isset($_POST['submit'])) {
    $forobj = new Login();
    $err = $forobj->ExecuteForgotPass($_POST['email'], $_POST['password1'], $_POST['password2']);
    if (!isset($err)) {
        header("Location: ../login/index");
    }
}
?>

<link rel="stylesheet" href="../css/forgot.css">

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
    <div class="container">
        <div class="forms">
            <div class="form login">
                <?php
                if (isset($err)) {
                    echo "<div class='alert alert-success' style='font-size:2em' role='alert'>
                    <p>$err</p>
                  </div>";
                } ?>
                <span class="title">Forgot Password</span>

                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" name="email" id="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password1" class="password" placeholder="Enter your new password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password2" class="password" placeholder="Re-enter your new password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="submit" value="Change Password">
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>