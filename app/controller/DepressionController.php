<?php
session_start();
if (isset($_SESSION["id"])) {
    require "./app/resources/views/depression.php";
} else {
    $actual_link = $_SERVER["REQUEST_URI"];
    header("location:/login/?depression");
    exit;
}
