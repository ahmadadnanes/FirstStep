<?php
namespace app\controller;

use app\include\Validation;
use app\Model\Contact;

include './app/functions/autoloader.php';

class ContactController extends Contact{
    public static function create($email , $contact){
        if (isset($_POST["submit"])) {
            $email = Validation::validate_email($email);
            $contact = Validation::validate_text($contact);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $contact = Validation::validate_text($contact);
                if (Contact::insert($email, $contact)) {
                    header("location: /");
                } else {
                    header("location: //?msg=1");
                }
                exit();
            }
        }
    }
}

