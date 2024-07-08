<?php
namespace app\Model;
use app\Model\Connect;

require "vendor/autoload.php";
class Contact extends Connect
{
    public static function insert($email, $contact): bool
    {
        require './app/include/check_form_token.php';
        
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("INSERT INTO contact (email,content) VALUES (?,?)");
        $sql->bind_param('ss', $email, $contact);

        return $sql->execute();
    }
}
