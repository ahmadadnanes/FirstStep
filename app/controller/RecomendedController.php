<?php
namespace app\controller;
use app\controller\UserController;

require 'vendor/autoload.php';
class RecomendedController{
    public static function index(){
        if(UserController::guest()){
            header('location: /login/?psy');
            exit;
        }
        if(isset(explode('/', $_SERVER["REQUEST_URI"])[2])){
            $server = explode('/', $_SERVER["REQUEST_URI"])[2];
            if($server == "ar"){
                return require "./resources/views/rtl/Recomended.rtl.php";
            }
        }


        return require './resources/views/Recomended.php';
    }
}