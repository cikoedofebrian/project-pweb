<?php
Session::init();
if (Session::exists('email')) {
    header("Location: ../login/profile");
    die();
}

if (isset($_POST['submit'])) {
    $loginobj = new Login();
    $errl = $loginobj->Login($_POST['email'], $_POST['password']);
    if (!isset($errl)) {
        if (isset($_POST['remember']) == "Yes") {
            Cookie::put("email", $_POST['email']);
        };
        header("Location: ../home/index");
        die();
    }
}

if (isset($_POST['register'])) {
    $loginobj = new Login();
    $err = $loginobj->RegisterNewAccount($_POST['rname'], $_POST['remail'], $_POST['raddress'], $_POST['rpassword1'], $_POST['rpassword2']);
    if (!isset($err)) {
        header("Location: ../home/index");
    }
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

    <div class="container w-screen" style="margin: 0px auto; margin-top: 20vh;">
        <div class="forms">

            <div class="form login">
                <?php if (isset($errl)) {
                    echo "<div class='alert alert-success' style='font-size:2em' role='alert'>
            <p>$errl</p>
          </div>";
                } ?>
                <span class="title">Login</span>
                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" id="email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="Enter your password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck" name="remember" value="Yes">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="./forgotpass" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit" class="btn btn-primary my-5"></input>
                    </div>

                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Sign up Now</a>
                    </span>
                </div>
            </div>

            <div class="form signup">
                <?php
                if (isset($err)) {
                    echo "<div class='alert alert-success' style='font-size:2em' role='alert'>
                    <p>$err</p>
                  </div>";
                }
                ?>
                <span class="title">Register</span>
                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Name" name="rname" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Email" name="remail" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Address" name="raddress" required>
                        <i class="uil uil-map icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Password" name="rpassword1" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm password" name="rpassword2" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="register" class="btn btn-primary my-5"></input>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Log in Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="/public/js/login.js"></script>
</body>