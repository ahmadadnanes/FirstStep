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
            require("./app/resources/views/admin/changePassword.php");
        } else {
            if (isset($_POST["submit"])) {
                $admin = new admin;
                $admin->changePassword($_SESSION["id"], $_POST["oldPass"], $_POST["newPass"]);
            }
        }
    }
} else {
    require("./app/resources/views/login.php");
}
