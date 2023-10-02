<?php
include 'classes/class.php';
session_start();
$id = implode($_SESSION["id"]);
$title = $_POST["title"];
$content = $_POST["content"];

$sql = "INSERT INTO diary (user_id,diary_title,diary_content) VALUES ($id,'$title','$content')";

$result = conn::connect()->execute_query($sql);
$result->close();
header("location:../YourDiares.php");
exit();
