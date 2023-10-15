<?php
include_once "./app/classes/user.php";
session_start();
$error = 1;

function signup()
{
    global $error;

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    if (user::createUser($username, $email, $password)) {
        header("location:/login");
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
        $result = user::checkPass($email, $pass);
        if ($result) {
            if (isset($_SERVER["QUERY_STRING"])) {
                $pre_header = $_SERVER["QUERY_STRING"];
                header("location: /" . $pre_header);
            } else {
                header("location: /");
            }
        } else {
            header("location:/login/?msg=$error");
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
