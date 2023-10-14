<?php
include_once "app/classes/user.php";

session_start();

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $_SESSION["user"] = user::getUser($id);
}
require("./app/resources/views/Home.php");
