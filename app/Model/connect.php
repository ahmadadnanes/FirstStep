<?php

class connect
{
    private static  $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static  $db = "first_step_remastered";

    public static  function conn(): mysqli
    {
        $mysqli = new \mysqli(connect::$host, connect::$user, connect::$pass, connect::$db);

        if ($mysqli->connect_errno) {
            echo "Failed to connect to Mysql:" . $mysqli->connect_error;
        }

        return $mysqli;
    }
}
