<?php
namespace app\Model;

use PSpell\Config;

include_once "Connect.php";

class Admin extends Connect
{
    public function checkPass($id, $old): bool
    {
        $db = new Connect;
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
        $db = new Connect;
        $conn = $db->conn();
        $sql = $conn->prepare("UPDATE users SET pass = ? WHERE id = ?");
        $sql->bind_param('ss', md5($new), $id);
        $sql->execute();
        $result = $sql->get_result();
        $total = $result->fetch_all();
        return $total;
    }
    public function users_count(){
        $db = new Connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT COUNT(*) FROM users");
        $sql->execute();
        $result = $sql->get_result();
        $total = $result->fetch_all();
        return $total;
    }

    public function admins_count(){
        $db = new Connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT COUNT(*) FROM WHERE admin = ?");
        $sql->bind_param('i' , 1);
        $sql->execute();
        $result = $sql->get_result();
        $total = $result->fetch_all();
        return $total;
    }

    public function diaries_count(){
        $db = new Connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT COUNT(*) FROM diary");
        $sql->execute();
        $result = $sql->get_result();
        $total = $result->fetch_all();
        return $total;
    }

    public function comments_count(){
        $db = new Connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT COUNT(*) FROM comments");
        $sql->execute();
        $result = $sql->get_result();
        $total = $result->fetch_all();
        return $total;
    }
}
