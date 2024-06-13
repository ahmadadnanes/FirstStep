<?php
include_once 'connect.php';

class user extends connect
{

    public static function createUser($username, $email, $password, $admin = 0): bool
    {
        $db = new connect();
        $conn = $db->conn();
        // select email
        $sql_email = $conn->prepare("SELECT email from users where email like ?");
        $sql_email->bind_param('s', $email);
        $sql_email->execute();
        $result_email = $sql_email->get_result();

        // select user
        $sql_user = $conn->prepare("SELECT username from users where username like ?");
        $sql_user->bind_param('s', $username);
        $sql_user->execute();
        $result_user = $sql_user->get_result();
        // check if the user and email already exist
        if ($result_email->num_rows || $result_user->num_rows) {

            return false;
        } else {
            // create new user
            $sql2 = $conn->prepare("insert into users(username,email,pass,admin) values (?,?,?,?)");
            $sql2->bind_param('sssi', $username, $email, $password, $admin);
            $sql2->execute();
            session_start();
            $_SESSION["success"] = "Your account has been created";
            return true;
        }
    }

    public static function checkEmail($email)
    {
        $db = new connect();
        $conn = $db->conn();
        // check email
        $sql = $conn->prepare("SELECT email from users where email like ?");
        $sql->bind_param('s', $email);
        $sql->execute();

        return $sql->get_result();
    }

    public static function checkPass($em, $pass)
    {
        $db = new connect();
        $conn = $db->conn();

        // select password
        $sql = $conn->prepare("SELECT pass from users where email like ?");
        $sql->bind_param('s', $em);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();

        // check password
        if ($row['pass'] == md5($pass)) {
            $sql2 = $conn->prepare("SELECT id from users where email like ?");
            $sql2->bind_param('s', $em);
            $sql2->execute();
            $result2 = $sql2->get_result();

            @session_start();
            $idRow = $result2->fetch_assoc();
            $_SESSION["id"] = $idRow['id'];
            $id = $_SESSION["id"];
            $_SESSION["user"] = user::getUser($id);
            return true;
        } else {
            return false;
        }
    }

    public static  function getUser($id)
    {
        $db = new connect();
        $conn = $db->conn();

        $sql = $conn->prepare("SELECT username from users where id like ?");
        $sql->bind_param('s', $id);
        $sql->execute();

        $result = $sql->get_result();
        $us = $result->fetch_assoc();
        return $us["username"];
    }

    public static function UserType($id)
    {
        $db = new connect();
        $conn = $db->conn();

        $sql = $conn->prepare("SELECT admin from users where id like ?");
        $sql->bind_param('s', $id);
        $sql->execute();

        $result = $sql->get_result();
        $type = $result->fetch_assoc();
        if ($type["admin"]) {
            $_SESSION["admin"] = true;
        }
        return $type["admin"];
    }
}
