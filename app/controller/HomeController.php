<?php 
namespace app\controller;
use app\controller\UserController;
use app\include\Validation;

require "vendor/autoload.php";

@session_start();
class HomeController{
    public static function index(){
        $server = explode('/', $_SERVER["REQUEST_URI"])[1];
            if(UserController::guest()){
                if(isset($_COOKIE["email"],$_COOKIE["password"])){
                    $email = Validation::validate_email($_COOKIE["email"]);
                    $pass = Validation::validate_text($_COOKIE["password"]);
                    $user = new UserController();
        
                    if(!($user->auth($email , $pass))){
                        return require ('resources/views/Home.php');
                    }
                }
                
                if($server == "ar")
                    return require('resources/views/rtl/Home.rtl.php');
                else
                    return require ('resources/views/Home.php');
            }

            if (!isset($_GET["msg"])) {
                if($server == "ar"){
                    return require ('./resources/views/rtl/Home.rtl.php');
                }
                else{
                    return require ('resources/views/Home.php');
                }
            }    
    }        
}