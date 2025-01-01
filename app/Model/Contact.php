<?php
namespace app\Model;

use app\include\csrf;
use app\Model\Connect;

require "vendor/autoload.php";
class Contact extends Connect
{
    public static function insert($email, $contact): bool
    {
        if(csrf::check_form_token()){
            $db = new connect();
            $conn = $db->conn();
            $sql = $conn->prepare("INSERT INTO contact (email,content) VALUES (?,?)");
            $sql->bind_param('ss', $email, $contact);

            return $sql->execute();
        }
    }
}
