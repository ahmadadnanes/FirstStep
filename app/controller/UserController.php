<?php
namespace app\controller;
use app\Model\User;
use app\include\Validation;

include './app/include/autoloader.php';
@session_start();
$errors = [];

class UserController extends User
{
    public static function guest(){
        return !isset($_SESSION["id"]);
    }

    public static function index(){
        if(isset($_get["lang"])){
            require('./resources/views/rtl/auth.rtl.php');
        }
        else{
            require('./resources/views/auth.php');
        }
    }

    public static function profile(){
        
    }

    public static function create($username , $email , $password)
    {
        $username = $username;
        $email = Validation::validate_email($email);
        $password = md5($password);
        if ($email) {
            $username = Validation::validate_text($username);
            $password = Validation::validate_text($password);

            if (User::insert($username, $email, $password)) {
                header("location:/login");
            } else {
                $errors["used"] = "this email or username is already in use";
                header("location:/signup/?msg=" . $errors["used"]);
            }
        } else {
            header("location:/signup/?msg=please fill the email field correctly");
        }
        exit;
    }

    public static function auth($email , $password)
    {
        $email = Validation::validate_email($email);
        $password = Validation::validate_text($password);

        if($email && $password){
            if(UserController::get_email($email)){
                if(UserController::get_password($email,$password)){
                    if(isset($_POST["remember"])){
                        setcookie("email" , $email , time() + strtotime("1 month"));
                        setcookie("password" , $password , time() + strtotime("1 month"));
                    }
                    if (isset($_SERVER["QUERY_STRING"]) && !isset($_GET["msg"])) {
                        header("location: /" . $_SERVER["QUERY_STRING"]);
                    }else{
                        header("location: /");
                    }
                }else{
                    header("location: /login/?msg=this password is wrong");
                }
            }else{
                header("location: /login/?msg=this email is wrong");
            }
        }else{
            header("location: /login/?msg=please check the input");
        }
        exit;
    }
}



// $server = explode('/', $_SERVER["REQUEST_URI"])[1];
// if ($server == "signup") {
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         if (isset($_POST["submit"])) {
//             $user = new UserController(trim($_POST["username"]), $_POST["email"], trim($_POST["password"]));
//             $user->create();
//         }
//     }
// } else if ($server == "login") {
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         if (isset($_POST["submit"])) {
//             $user = new UserController(null, $_POST["email"], trim($_POST["password"]));
//             $user->auth();
//         }
//     } else {
//         if (isset($_SESSION["id"])) {
//             if (user::verify_admin($_SESSION["id"])) {
//                 header("location: /admin");
//             } else {
//                 require "resources/views/Home.php";
//             }
//         }
//     }
//     exit;
// } else if ($server == "" || $server == "index.php") {
//     if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
//         $pass = Validation::validate_text($_COOKIE["password"]);
//         $user = new UserController(null, $_COOKIE["email"], $pass);
//         $user->create();
//     } else {
//         require('resources/views/Home.php');
//     }
// }
