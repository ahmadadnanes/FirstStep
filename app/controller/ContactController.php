<?php
include './app/Model/contactModel.php';
include './app/functions/validate.function.php';
if (isset($_POST["submit"])) {
    $email = validate($_POST["email"]);
    $contact = validate($_POST["contact"]);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $contact = validate($contact);
        if (contactModel::NewContact($email, $contact)) {
            header("location: /");
        } else {
            header("location: //?msg=1");
        }
    }
}
exit();
