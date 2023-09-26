<?php
require "conn.php";
session_start();
$id = implode($_SESSION["id"]);
$title = $_POST["title"];
$content = $_POST["content"];

$sql = "INSERT INTO diary (user_id,diary_title,diary_content) VALUES ($id,'$title','$content')";

$result = mysqli_query($conn, $sql);
header("location:../YourDiares.php");
exit();
mysqli_close($conn);
