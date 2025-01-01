<?php 
namespace app\controller;
use app\controller\UserController;

class DepressionController{
    public static function index(){
        if(UserController::guest()){
            header('location: /login/?depression');
            exit;
        }
        return require './resources/views/depression.php';
    }
}