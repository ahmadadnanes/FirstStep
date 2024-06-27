<?php
namespace app\Model;
use app\Model\Connect;

include "./app/include/autoloader.php";
class Contact extends Connect
{
    public static function insert($email, $contact): bool
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("INSERT INTO contact (email,content) VALUES (?,?)");
        $sql->bind_param('ss', $email, $contact);

        return $sql->execute();
    }
}
