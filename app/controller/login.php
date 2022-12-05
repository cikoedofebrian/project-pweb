<?php

class Login extends Controller
{
    public function Index()
    {
        $this->view("login/index");
    }

    public function Error()
    {
        $this->view("login/error404");
    }

    public function Login($email, $password)
    {
        Session::init();
        Session::put('user', $email);
        $result = $this->model('Account_model')->getUser($email);
        if (mysqli_num_rows($result) <= 0) {
            return "Tidak bisa menemukan akun";
        }
        $result = mysqli_fetch_array($result);

        if ($password != $result['password']) {
            return "Password salah";
        }

        Session::init();
        Session::put('email', $email);
    }

    public function Logout()
    {
        Session::init();
        Session::delete("email");
        if (Cookie::exists("email")) {
            Cookie::delete("user");
        }
        header("Location: ../home/index");
    }

    public function RegisterNewAccount($name,  $email, $address, $password1, $password2)
    {

        $result = $this->model('Account_model')->getUser($email);
        if (mysqli_num_rows($result) > 0) {
            return "Sudah ada yang memakai email ini";
        }
        if ($password1 != $password2) {
            return "Password harus sama antara satu sama lain";
        }

        $this->model('Account_model')->register($name, $email, $address, $password1);
        Session::init();
        Session::put('email', $email);
    }

    public function findRowfromSession()
    {
        Session::init();
        $result = $this->model('Account_model')->getUser($_SESSION['email']);
        return $result;
    }

    public function ForgotPass()
    {
        $this->view("login/forgotpass");
    }

    public function ExecuteForgotPass($email, $password1, $password2)
    {

        $result = $this->model('Account_model')->getUser($email);
        if (mysqli_num_rows($result) <= 0) {
            return "Email tidak ditemukan";
        }
        if ($password1 != $password2) {
            return "Password harus cocok satu sama lain";
        }
        if ($password1 != $password2) {
            return "Password harus sama";
        }
        $this->model('Account_model')->update($email, $password1);
    }

    public function Profile()
    {
        $data = mysqli_fetch_array($this->findRowfromSession());
        $this->view("login/profile", $data);
    }
}
