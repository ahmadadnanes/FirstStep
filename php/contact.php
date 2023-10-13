<?php
include 'classes/contactModel.php';

$email = $_POST["email"];
$contact = $_POST["contact"];


if (contactModel::NewContact($email, $contact)) {
    header("location: ../index.php");
} else {
    header("location: ../index.php?msg=1");
}
exit();
