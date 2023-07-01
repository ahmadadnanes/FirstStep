<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "first_step_remastered";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$conn) {
    echo "Error" . mysqli_connect_error();
}
