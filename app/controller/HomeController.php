<?php 
namespace app\controller;
use app\controller\UserController;
use app\include\csrf;
use app\include\Validation;
use app\Model\User;

require "vendor/autoload.php";

@session_start();
class HomeController{
    public static function index(){
        $server = explode('/', $_SERVER["REQUEST_URI"])[1];
            if(UserController::guest()){
                if(isset($_COOKIE["token"])){
                    $id = UserController::check_user_token();
                    if($id){
                        @session_start();
                        $_SESSION["id"] = $id;
                        $_SESSION["user"] = User::get_user($id);
                    }
                }
                
                if($server == "ar")
                    return require('resources/views/rtl/Home.rtl.php');
                else
                    return require ('resources/views/Home.php');
            }

            if($server == "ar"){
                return require ('./resources/views/rtl/Home.rtl.php');
            }
            else{
                return require ('resources/views/Home.php');
            }
    }        
}