<?php
class controller{
    public function model($model){
        require_once "./MVC/Models/".$model.".php";
        return new $model;
    }
    public function view($view,$data=[]){
        require_once "./MVC/Views/".$view.".php";
    }
    public function giatri($dulieu=[]){
        require_once "./MVC/Views/Login.php";
    }
}
