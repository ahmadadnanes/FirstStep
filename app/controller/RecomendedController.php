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
        return require './resources/views/Recomended.php';
    }
}