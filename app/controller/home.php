<?php

require_once __DIR__ ."/../init.php";

class Home extends Controller
{
    public function Index()
    {
        $this->view("home/index");
    }
}
