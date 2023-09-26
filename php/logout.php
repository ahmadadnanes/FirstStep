<?php
require "conn.php";
session_start();
if (isset($_SESSION["id"])) {
    session_unset();
    header("location: ../index.php");
    exit();
} else {
    header("location: ../index.php");
    exit();
}

mysqli_close($conn);
