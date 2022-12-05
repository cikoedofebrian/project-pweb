<?php
require_once __DIR__ ."/../init.php";
class Index extends Controller
{
    public function Index()
    {
        $this->view("index/index");
    }
}

