<?php
@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];

if (isset($_SESSION["id"])) {
    if ($server == "psy") {
        require "./app/resources/views/Recomended.php";
    } else {
        require "./app/resources/views/depression.php";
    }
} else {
    if ($server == "psy") {
        header("location:/login/?psy");
    } else {
        header("location:/login/?depression");
    }
}
exit;
