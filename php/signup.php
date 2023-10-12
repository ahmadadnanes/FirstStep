<?php
include 'classes/connect.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = md5($_POST["password"]);
$error = 1;

$sql_email = "SELECT email from users where email like '$email'";
$result_email = connect::conn()->execute_query($sql_email);

$sql_user = "SELECT username from users where username like '$username'";
$result_user = connect::conn()->execute_query($sql_user);

if ($result_email->num_rows || $result_user->num_rows) {
    header("location:../signup.php?msg=$error");
} else {
    $sql2 = " insert into users(username,email,pass) values ('$username','$email','$password')";
    $result2 = connect::conn()->execute_query($sql2);
    header("location:../login.php");
}
exit();
