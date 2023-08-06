<?php
require "conn.php";
session_start();
if (isset($_SESSION["id"])) {
    session_unset();
    header("location: ../index.php");
} else {
    header("location: ../index.php");
}

mysqli_close($conn);
