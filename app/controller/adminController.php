<?php
namespace app\controller;
use app\include\Validation;
use app\Model\Admin;

@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];

class AdminController extends Admin
{
    public static function index(){
        if(!UserController::guest()){
            if(UserController::verify_admin($_SESSION["id"]))
                require('./resources/views/admin/index.php');
        }else{
            header("location: /login");
            exit;
        }
    }
}

