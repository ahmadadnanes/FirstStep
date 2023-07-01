<?php
include "conn.php";
session_start();
if (isset($_SESSION["id"])) {
    session_unset();
    header("location: ../login.html");
} else {
    header("location: ../login.html");
}

mysqli_close($conn);
