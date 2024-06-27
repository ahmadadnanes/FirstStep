<?php
namespace app\controller;
@session_start();

class ServicesController {
    public static function index(){
        $server = explode('/', $_SERVER["REQUEST_URI"])[1];
        if (!UserController::guest()) {
            if(isset($_GET["lang"])){
            }
            if ($server == "psy") {
                require "resources/views/Recomended.php";
            } else {
                require "resources/views/depression.php";
            }
        } else {
            if ($server == "psy") {
                if(isset($_GET["lang"])){
                    header("location:/login/");
                }else{
                    header("location:/login/?psy");
                }
            } else {
                header("location:/login/?depression");
            }
        }
        exit;
    }
}
