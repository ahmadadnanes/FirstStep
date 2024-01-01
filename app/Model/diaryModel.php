<?php
include_once 'connect.php';
class diaryModel extends connect
{
    public static function SaveDiary($id, $title, $content, $private)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("INSERT INTO diary (user_id,diary_title,diary_content,private) VALUES (?,?,?,?)");
        $sql->bind_param('sssi', $id, $title, $content, $private);
        $sql->execute();

        return true;
    }

    public static function all()
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERE private = 0");
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all();

        return $diaries;
    }

    public static function GetDiary($id)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT id,diary_title,diary_content,private FROM diary WHERe user_id like ? ORDER BY id DESC");
        $sql->bind_param('s', $id);
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all();
        return $diaries;
    }

    public static function DeleteDiary($id)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("DELETE FROM diary WHERE id LIKE ?");
        $sql->bind_param('s', $id);
        $sql->execute();
    }

    public static function GetDiaryByUser($UserId)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT id,diary_title,diary_content FROM diary WHERE user_id like ? and private = 0 ORDER BY id DESC");
        $sql->bind_param('s', $UserId);
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all();

        return $diaries;
    }
}
