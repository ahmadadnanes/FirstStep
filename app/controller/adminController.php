<?php
include_once "./app/Model/adminModel.php";
@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];

class admin extends adminModel
{
    public function changePassword($id, $old, $new)
    {
        if ($this->checkPass($id, $old)) {
            $this->changePass($id, $new);
            return true;
        } else {
            return "Old Password is Wrong Please Try Again";
        }
    }
}

if (isset($_SESSION["id"])) {
    if ($server == 'admin') {
        require("./app/resources/views/admin/Home.admin.php");
    } else if ($server == 'changePassword') {
        if ($_SERVER["REQUEST_METHOD"] == 'GET') {
            if (isset($_SESSION["id"])) {
                require("./app/resources/views/admin/changePassword.php");
            } else {
                header("location: /login");
            }
        } else {
            if (isset($_POST["submit"])) {
                $admin = new admin;
                $result = $admin->changePassword($_SESSION["id"], $_POST["oldPass"], $_POST["newPass"]);
                if (is_bool($result)) {
                    header("location: /changePassword");
                } else {
                    header("location: /changePassword/?msg=$result");
                }
                exit;
            }
        }
    }
} else {
    require("./app/resources/views/login.php");
}
