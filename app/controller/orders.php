<?php
require_once __DIR__."/../init.php";
class Orders extends Controller
{
    public function Index()
    {
        $this->view("orders/index");
    }

    public function AddOrder($weight, $duration, $category, $payment, $user)
    {
        $this->model('Transaction_model')->AddNewOrder($weight, $duration, $category, $payment, $user);
    }

    public function History()
    {
        Session::init();
        if(!Session::exists('email')){
            $obj = new Login();
            $obj->Index();
            return;
        }
        $this->view("history/index");
    }

    public function getDataTable(){
        Session::init();
        $data = $this->model('Transaction_model')->getAllTable($_SESSION['email']);
        return $data;
    }
}
