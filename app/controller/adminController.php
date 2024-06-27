<?php
namespace app\controller;
use app\include\Validation;
use app\Model\Admin;

@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];

class AdminController extends Admin
{
    public static function index(){
        if(!UserController::guest()){
            if(UserController::verify_admin($_SESSION["id"]))
                require('./resources/views/admin/index.php');
        }else{
            header("location: /login");
        }
    }
    public function changePassword($id, $old, $new)
    {
        if($_SERVER["REQUEST_URI"] == 'GET'){
            require("resources/views/admin/changePassword.php");
        }else{
            if ($this->checkPass($id, $old)) {
                $this->changePass($id, $new);
                return true;
            } else {
            return "Old Password is Wrong Please Try Again";
            }  
        }
    }
}

// if (isset($_SESSION["id"])) {
//     if ($server == 'admin') {
//         require("resources/views/admin/Home.admin.php");
//     } else if ($server == 'changePassword') {
//         if ($_SERVER["REQUEST_METHOD"] == 'GET') {
//                 require("resources/views/admin/changePassword.php");
//         } else {
//             if (isset($_POST["submit"])) {
//                 $admin = new AdminController;
//                 $old = Validation::validate_text($_POST["oldPass"]);
//                 $new = Validation::validate_text($_POST["newPass"]);

//                 $result = $admin->changePassword($_SESSION["id"], $_POST["oldPass"], $_POST["newPass"]);
//                 if (is_bool($result)) {
//                     header("location: /changePassword");
//                 } else {
//                     header("location: /changePassword/?msg=$result");
//                 }
//                 exit;
//             }
//         }
//     }
// } else {
//     header("location: /login");
//     exit;
// }

