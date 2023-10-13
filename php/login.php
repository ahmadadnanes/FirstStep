<?php
include 'classes/user.php';
$email = trim($_POST["email"]);
$pass = trim($_POST["password"]);
$error = 1;

if (user::checkEmail($email)) {
    $id = user::checkPass($email, $pass);
    if ($id) {
        if (isset($_GET["pre"])) {
            $pre_header = $_GET["pre"];
            header("location:" . $pre_header);
        } else {
            header("location: ../index.php");
        }
        exit();
    } else {
        header("location:../login.php?msg=$error");
        exit();
    }
} else {
    header("location:../login.php?msg=$error");
    exit();
}
