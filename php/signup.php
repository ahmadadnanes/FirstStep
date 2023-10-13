<?php
include 'classes/user.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$error = 1;

if (user::createUser($username, $email, $password)) {
    header("location:../login.php");
} else {
    header("location:../signup.php?msg=$error");
}
exit();
