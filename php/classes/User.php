<?php
namespace php\classes;
require_once __DIR__ . "../../conn.php";
class User
{
    
        public static  function getUser($id) {
            global $conn;
            $sql = "SELECT username from users where id = '$id'";
            $result = mysqli_query($conn, $sql);
            $us = mysqli_fetch_assoc($result);
            
            return $us["username"];
        }
    
}

