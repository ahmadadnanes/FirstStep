<?php

class user extends connect
{
    public static  function getUser($id) {
        $sql = "SELECT username from users where id = '$id'";
        $result = User::conn()->execute_query($sql);
        $us = $result->fetch_assoc();

        return $us["username"];
    }
}