<?php
include_once "connect.php";

class adminModel extends connect
{
    public function checkPass($id, $old)
    {
        $db = new connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT pass FROM users WHERE id = ?");
        $sql->bind_param('s', $id);
        $sql->execute();

        $result = $sql->get_result();
        return $result->num_rows > 0;
    }
    public function changePass($id, $new)
    {
        $db = new connect;
        $conn = $db->conn();
        $sql = $conn->prepare("UPDATE users SET pass = ? WHERE id = ?");
        $sql->bind_param('ss', $new, $id);
        $sql->execute();

        $result = $sql->get_result();
        return $result;
    }
}
