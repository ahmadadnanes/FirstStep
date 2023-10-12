<?php
include 'classes/connect.php';
session_start();
$id = implode($_SESSION["id"]);

$email = $_POST["email"];
$contact = $_POST["contact"];

$sql = "INSERT INTO contact (email,content) VALUES ('$email','$contact')";
$result = connect::conn()->execute_query($sql);

if ($result) {
    header("location: ../index.php?id=$id");
} else {
    header("location: ../index.php?msg=1");
}
exit();
