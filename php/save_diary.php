<?php
include 'classes/connect.php';
session_start();
$id = implode($_SESSION["id"]);
$title = $_POST["title"];
$content = $_POST["content"];

$sql = "INSERT INTO diary (user_id,diary_title,diary_content) VALUES ($id,'$title','$content')";

$result = connect::conn()->execute_query($sql);
header("location:../YourDiares.php");
exit();
