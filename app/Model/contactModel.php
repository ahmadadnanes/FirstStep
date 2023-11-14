<?php
include_once "connect.php";
class contactModel extends connect
{
    public static function NewContact($email, $contact)
    {
        $db = connect::conn();

        $sql = $db->prepare("INSERT INTO contact (email,content) VALUES (?,?)");
        $sql->bind_param('ss', $email, $contact);
        $sql->execute();

        $db->close();
        return true;
    }
}
