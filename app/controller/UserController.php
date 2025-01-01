<?php
namespace app\controller;

use app\include\csrf;
use app\Model\User;
use app\include\Validation;

require 'vendor/autoload.php';
@session_start();
$errors = [];

class UserController extends User
{
    public static function guest(){
        return !isset($_SESSION["id"]);
    }

    public static function index(){
        if(isset(explode('/',$_SERVER["REQUEST_URI"])[2]) && explode('/',$_SERVER["REQUEST_URI"])[2] == 'ar'){
            require('./resources/views/rtl/auth.rtl.php');
        }
        else{
            require('./resources/views/auth.php');
        }
    }

    public static function profile(){
        
    }

    public static function create($username , $email , $password , $confirm)
    {
        $username = $username;
        $email = Validation::validate_email($email);
        $password = md5($password);
        if (!$email) {
            header("location:/signup/?msg=please fill the email field correctly");
            exit;
        } 

        $username = Validation::validate_text($username);
        $password = Validation::validate_text($password);
        $confirm = Validation::validate_text($confirm);

        if((!$password == $confirm)){
            header("location:/signup/?msg=password is not correct");
            exit;
        }
        if (!User::insert($username, $email, $password)) {
            $errors["used"] = "this email or username is already in use";
            header("location:/signup/?msg=" . $errors["used"]);
            exit;
        } 
        header("location:/login");
        exit;
    }

    public static function auth($email , $password)
    { 
            if(csrf::check_form_token()){
                $email = Validation::validate_email($email);
                $password = Validation::validate_text($password);
        
                if(!($email && $password)){
                    header("location: /login/?msg=please check the input");
                    exit;
                }
        
        
                if(!UserController::get_email($email)){
                    header("location: /login/?msg=this email is wrong");
                    exit;
                }
        
                $id = UserController::get_password($email,$password);
                if(!$id){
                    header("location: /login/?msg=this password is wrong Or Your Account is not verified");
                    exit;
                }
        
                if(isset($_POST["remember"])){
                    User::insert_remember_token($id);
                }
        
                if (isset($_SERVER["QUERY_STRING"]) && !isset($_GET["msg"])) {
                    header("location: /" . $_SERVER["QUERY_STRING"]);
                }else{
                    header("location: /");
                }
                exit;
            }
    }

    public static function verify($token){
        if(User::verify_user($token)){
            $_SESSION["status"] = "Your Email Has Been Verified";
        }else{
            $_SESSION["status"] = "This link is broken";
        }
        header("location: /login");
        exit;
    }

    public static function destroy()
    {
        @session_start();
        if (isset($_SESSION["id"])) {
            if (isset($_COOKIE["token"])) {
                unset($_COOKIE["token"]);
                setcookie("token", "", -1, '/');
            }
            UserController::delete_user_token($_SESSION["id"]);
            session_destroy();
        }
        header("location: /");
        exit;
    }
}
