<?php
include_once "./app/classes/user.php";
$error = 1;

function signup()
{
    global $error;

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    if (user::createUser($username, $email, $password)) {
        header("location:../login.php");
    } else {
        header("location:/signup/?msg=$error");
    }
    exit;
}

function login()
{
    global $error;

    $email = trim($_POST["email"]);
    $pass = trim($_POST["password"]);

    if (user::checkEmail($email)) {
        $id = user::checkPass($email, $pass);
        if ($id) {
            if (isset($_GET["pre"])) {
                $pre_header = $_GET["pre"];
                header("location:" . $pre_header);
            } else {
                header("location: /");
            }
        } else {
            header("location:/login");
        }
    } else {
        header("location:/login/?msg=$error");
    }
}



if ($_SERVER["REQUEST_URI"] == "/signup") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        signup();
    } else {
        require("./app/resources/views/signup.php");
    }
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        login();
    } else {
        if (isset($_SESSION["id"])) {
            require "./app/resources/views/Home.php";
        } else {
            require "./app/resources/views/login.php";
        }
    }
    exit;
}
