<?php
include 'classes/class.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$error = 1;

$sql_email = "SELECT email from users where email like '$email'";
$result_email = conn::connect()->execute_query($sql_email);

$sql_user = "SELECT username from users where username like '$username'";
$result_user = conn::connect()->execute_query($sql_user);

if ($result_email->num_rows || $result_user->num_rows) {
    $result_email->close();
    $result_user->close();
    header("location:../signup.php?msg=$error");
    exit();
} else {
    $sql2 = " insert into users(username,email,pass) values ('$username','$email','$password')";
    $result2 = conn::connect()->execute_query($sql2);
    $result2->close();
    header("location:../login.php");
    exit();
}
