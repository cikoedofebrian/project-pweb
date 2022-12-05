<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once VIEW_PATH . "template/header.php";
        require_once VIEW_PATH . $view .  ".php";
        require_once VIEW_PATH . "template/footer.php";
    }

    public function model($model)
    {
        require_once "../app/model/" . $model . ".php";
        return new $model;
    }
}
