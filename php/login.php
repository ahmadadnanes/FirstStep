<?php
include 'classes/connect.php';
$email = trim($_POST["email"]);
$sql = "SELECT email from users where email like '$email'";
$result = connect::conn()->execute_query($sql);
$pass = trim($_POST["password"]);
$error = 1;
if (mysqli_num_rows($result)) {
    checkPass($email, $pass);
} else {
    header("location:../login.php?msg=$error");
    exit();
}


function checkPass($em, $pass)
{
    global $error;
    $sql = "SELECT pass from users where email like '$em'";
    $result = connect::conn()->execute_query($sql);
    $row = $result->fetch_assoc();
    $result->close();

    if ($row["pass"] == md5($pass)) {
        $sql2 = "SELECT id from users where email like '$em'";
        $result2 = connect::conn()->execute_query($sql2);

        session_start();
        $idrow = $result2->fetch_assoc();
        $result2->close();
        $_SESSION["id"] = $idrow;
        $id = implode($_SESSION["id"]);
        if (isset($_GET["pre"])) {
            $pre_header = $_GET["pre"];
            header("location:" . $pre_header);
            exit();
        } else {
            header("location: ../index.php?$id");
            exit();
        }
    } else {
        header("location:../login.php?msg=$error");
        exit();
    }
}
