<?php

class Controller
{
    public function view($view, $data = [])
    {
        header("Location: ../$view.php");
    }

    public function model($model)
    {
        require_once __DIR__ ."/../model/" .$model .".php";
        return new $model;
    }
}
