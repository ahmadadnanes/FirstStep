<?php
include './app/Model/contactModel.php';
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $contact = $_POST["contact"];
}


if (contactModel::NewContact($email, $contact)) {
    header("location: /");
} else {
    header("location: //?msg=1");
}
exit();
