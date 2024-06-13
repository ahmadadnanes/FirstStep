<?php
@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];

if (isset($_SESSION["id"])) {
    if ($server == "psy") {
        if(isset($_GET["lang"])){
        }
        require "./app/resources/views/Recomended.php";
    } else {
        if(isset($_GET["lang"])){

        }
        require "./app/resources/views/depression.php";
    }
} else {
    if ($server == "psy") {
        if(isset($_GET["lang"])){
            header("location:/login/");
        }else{
            header("location:/login/?psy");
        }
    } else {
        header("location:/login/?depression");
    }
}
exit;
