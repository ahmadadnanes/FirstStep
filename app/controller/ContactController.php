<?php
include '../Project-2-remasterd/app/classes/contactModel.php';

$email = $_POST["email"];
$contact = $_POST["contact"];


if (contactModel::NewContact($email, $contact)) {
    header("location: /");
} else {
    header("location: /?msg=1");
}
exit();
