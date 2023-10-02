<?php
class conn
{
    private static  $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static  $db = "first_step_remastered";
    
    public static  function connect() {
        $mysqli = new \mysqli(conn::$host,conn::$user,conn::$pass,conn::$db);
        
        if($mysqli->connect_errno){
            echo "Failed to connect to Mysql:" . $mysqli->connect_error;
        }
        
        return $mysqli;
    }
}


class User extends conn
{
    
    public static  function getUser($id) {
        $sql = "SELECT username from users where id = '$id'";
        $result = User::connect()->execute_query($sql);
        $us = $result->fetch_assoc();
        
        return $us["username"];
    }
}
    