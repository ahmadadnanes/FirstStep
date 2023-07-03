<?php
include "conn.php";
session_start();
if (isset($_SESSION["id"])) {
    session_unset();
    header("location: ../login.php");
} else {
    header("location: ../login.php");
}

mysqli_close($conn);
