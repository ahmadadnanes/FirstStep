<?php
namespace app\Model;

use app\include\csrf;

require 'vendor/autoload.php';

class Admin extends Connect
{
    public static function checkPass($id, $old): bool
    {
        if(csrf::check_form_token()){
            $db = new Connect;
            $conn = $db->conn();
            $sql = $conn->prepare("SELECT pass FROM users WHERE id = ?");
            $sql->bind_param('s', $id);
            $sql->execute();
    
            $result = $sql->get_result();
            $row = $result->fetch_assoc();
            return $row["pass"] == md5($old);
        }
    }
    public static function changePass($id, $new)
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
