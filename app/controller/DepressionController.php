<?php 
namespace app\controller;
use app\controller\UserController;

class DepressionController{
    public static function index(){
        if(UserController::guest()){
            header('location: /login/?depression');
            exit;
        }

        if(isset(explode('/', $_SERVER["REQUEST_URI"])[2])){
            $server = explode('/', $_SERVER["REQUEST_URI"])[2];
            if($server == "ar"){
                return require "./resources/views/rtl/depression.rtl.php";
            }
        }

        return require './resources/views/depression.php';
    }
}