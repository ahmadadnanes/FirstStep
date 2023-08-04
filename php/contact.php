<?php
require "conn.php";
session_start();
$id = implode($_SESSION["id"]);

$email = $_POST["email"];
$contact = $_POST["contact"];

$sql = "INSERT INTO contact (email,content) VALUES ('$email','$contact')";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: ../Home.php?id=$id");
} else {
    echo "Error";
}

mysqli_close($conn);
