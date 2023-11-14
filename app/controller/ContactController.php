<?php
include './app/Model/contactModel.php';

$email = $_POST["email"];
$contact = $_POST["contact"];


if (contactModel::NewContact($email, $contact)) {
    header("location: /");
} else {
    header("location: //?msg=1");
}
exit();
