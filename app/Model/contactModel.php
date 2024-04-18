<?php
include_once "connect.php";
class contactModel extends connect
{
    public static function NewContact($email, $contact): bool
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("INSERT INTO contact (email,content) VALUES (?,?)");
        $sql->bind_param('ss', $email, $contact);

        return $sql->execute();
    }
}
