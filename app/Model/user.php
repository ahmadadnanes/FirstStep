<?php
include_once 'connect.php';

class user extends connect
{

    public static function createUser($username, $email, $password): bool
    {
        $db = connect::conn();

        // select email
        $sql_email = $db->prepare("SELECT email from users where email like ?");
        $sql_email->bind_param('s', $email);
        $sql_email->execute();
        $result_email = $sql_email->get_result();

        // select user
        $sql_user = $db->prepare("SELECT username from users where username like ?");
        $sql_user->bind_param('s', $username);
        $sql_user->execute();
        $result_user = $sql_user->get_result();

        // check if the user and email already exist
        if ($result_email->num_rows || $result_user->num_rows) {
            $db->close();
            return false;
        } else {
            // create new user
            $sql2 = $db->prepare("insert into users(username,email,pass) values (?,?,?)");
            $sql2->bind_param('sss', $username, $email, $password);
            $sql2->execute();
            $db->close();
            session_start();
            $_SESSION["success"] = "Your account has been created";
            return true;
        }
    }

    public static function checkEmail($email)
    {
        $db = connect::conn();
        // check email
        $sql = $db->prepare("SELECT email from users where email like ?");
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        $db->close();

        return $result;
    }

    public static function checkPass($em, $pass)
    {
        $db = connect::conn();

        // select password
        $sql = $db->prepare("SELECT pass from users where email like ?");
        $sql->bind_param('s', $em);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();

        // check password
        if ($row['pass'] == md5($pass)) {
            $sql2 = $db->prepare("SELECT id from users where email like ?");
            $sql2->bind_param('s', $em);
            $sql2->execute();
            $result2 = $sql2->get_result();

            session_start();
            $idRow = $result2->fetch_assoc();
            $_SESSION["id"] = $idRow['id'];
            $id = $_SESSION["id"];
            $_SESSION["user"] = user::getUser($id);
            $db->close();
            return true;
        } else {
            return false;
        }
    }

    public static  function getUser($id)
    {
        $db = connect::conn();

        $sql = $db->prepare("SELECT username from users where id like ?");
        $sql->bind_param('s', $id);
        $sql->execute();

        $result = $sql->get_result();
        $us = $result->fetch_assoc();
        $db->close();
        return $us["username"];
    }
}
