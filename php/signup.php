<?php
include "conn.php";

$username = $_POST["username"];
$email = $_POST["email"];
$password = md5($_POST["password"]);

$sql_email = "SELECT email from users where email like '$email'";
$result_email = mysqli_query($conn, $sql_email);

$sql_user = "SELECT username from users where username like '$user'";
$result_user = mysqli_query($conn, $sql_user);

if (mysqli_num_rows($result_email) || mysqli_num_rows($result_user)) {
    echo "email or usename exist";
} else {
    $sql2 = " insert into users(username,email,pass) values ('$username','$email','$password')";
    $result2 = mysqli_query($conn, $sql2);
    header("location:../login.php");
}

mysqli_close($conn);
