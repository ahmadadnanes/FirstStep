<?php
session_start();
if (isset($_SESSION["id"])) {
    if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
        unset($_COOKIE["email"]);
        unset($_COOKIE["password"]);
        setcookie("email", "", -1, '/');
        setcookie("password", "", -1, '/');
    }
    session_destroy();
}
header("location: /");
exit();
