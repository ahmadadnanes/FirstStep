<?php 
namespace app\controller;
use app\controller\UserController;
use app\include\Validation;

@session_start();
class HomeController{
    public static function index(){
            if(!UserController::guest()){
                if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
                    $email = Validation::validate_email($_COOKIE["email"]);
                    $pass = Validation::validate_text($_COOKIE["password"]);
                    $user = new UserController();
                    if($user->auth($email , $pass)){
                        if (isset($_SERVER["QUERY_STRING"]) && !isset($_GET["msg"])) {
                            if(isset($_GET["lang"])){
                                require ('./resources/views/rtl/Home.rtl.php');
                            }
                        }else
                            require ('resources/views/Home.php');
                    }else
                        require ('resources/views/Home.php');
                } else {
                    if(isset($_GET["lang"]))
                        require('resources/views/rtl/Home.rtl.php');
                    else
                        require ('resources/views/Home.php');
                }
            }else{
                if(isset($_GET["lang"]))
                    require('resources/views/rtl/Home.rtl.php');
                else
                    require ('resources/views/Home.php');
            }
    }
}