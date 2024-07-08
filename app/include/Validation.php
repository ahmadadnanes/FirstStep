<?php
namespace app\include;
class Validation{
    public static function validate_text(string $text ):string {
        if(strlen($text) > 0){
            $text = trim($text);
            return htmlspecialchars($text);
        }else{
            return false;
        }
    }
    public static function validate_email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) !== 0) {
            $email = Validation::validate_text($email);
            return $email;
        } else {
            return false;
        }
    }
}