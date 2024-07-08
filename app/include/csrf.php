<?php 
namespace app\include;

@session_start();
class csrf {
    public static function create_token(){
        if(!isset($_SESSION["token"])){
            $_SESSION["token"] = md5(uniqid(mt_rand() , true));
        }
        $token = $_SESSION['token'];
        echo "<input type='hidden' name='token' value='$token'>";
    }

    public static function check_form_token(){
        if(isset($_REQUEST["token"]) && $_REQUEST["token"] == $_SESSION["token"]){
            return true;
        }else{
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            exit;
        }
    }
}

