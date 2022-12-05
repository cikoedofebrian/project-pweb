<?php

class Orders extends Controller
{
    public function Index()
    {
        // $data = $this->model('Transaction_model')->getAllTable();
        $data = new Login();
        $data = $data->findRowfromSession();
        $data = mysqli_fetch_array($data);
        $this->view("orders/index", $data);
    }

    public function AddOrder($weight, $duration, $category, $payment, $user)
    {
        $this->model('Transaction_model')->AddNewOrder($weight, $duration, $category, $payment, $user);
    }

    public function History()
    {
        Session::init();
        $data = $this->model('Transaction_model')->getAllTable($_SESSION['email']);
        $this->view("history/index", $data);
    }
}
