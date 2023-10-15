<?php
session_start();
if ($_SERVER["REQUEST_URI"] == "/psy") {
    if (isset($_SESSION["id"])) {
        require "./app/resources/views/Recomended.php";
    } else {
        $actual_link = $_SERVER["REQUEST_URI"];
        header("location:/login/?psy");
        exit;
    }
}
