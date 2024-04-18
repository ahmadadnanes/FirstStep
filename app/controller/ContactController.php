<?php
include './app/Model/contactModel.php';
if (isset($_POST["submit"])) {
    $email = htmlspecialchars($_POST["email"]);
    $contact = htmlspecialchars($_POST["contact"]);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $contact = trim($contact);
        if (contactModel::NewContact($email, $contact)) {
            header("location: /");
        } else {
            header("location: //?msg=1");
        }
    }
}
exit();
