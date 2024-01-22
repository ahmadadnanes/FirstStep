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
        $row = $result->fetch_all();

        return $row["pass"] == md5($old);
    }
    public function changePass($id, $new)
    {
        $db = new connect;
        $conn = $db->conn();
        $sql = $conn->prepare("UPDATE users SET pass = ? WHERE id = ?");
        $sql->bind_param('ss', md5($new), $id);
        $sql->execute();

        $result = $sql->get_result();
        return $result;
    }
}
