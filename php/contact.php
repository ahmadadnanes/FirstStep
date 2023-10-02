<?php
include 'classes/class.php';
session_start();
$id = implode($_SESSION["id"]);

$email = $_POST["email"];
$contact = $_POST["contact"];

$sql = "INSERT INTO contact (email,content) VALUES ('$email','$contact')";
$result = conn::connect()->execute_query($sql);

if ($result) {
    $result->close();
    header("location: ../index.php?id=$id");
    exit();
} else {
    $result->close();
    header("location: ../index.php?msg=1");
    exit();
}
