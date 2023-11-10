<?php
include_once 'connect.php';
class diaryModel extends connect
{
    public static function SaveDiary($id, $title, $content, $private)
    {
        $db = connect::conn();
        $sql = $db->prepare("INSERT INTO diary (user_id,diary_title,diary_content,private) VALUES (?,?,?,?)");
        $sql->bind_param('sssi', $id, $title, $content, $private);
        $sql->execute();

        $db->close();
        return true;
    }

    public static function all()
    {
        $db = connect::conn();
        $sql = $db->prepare("SELECT * FROM diary WHERE private = 0");
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all();

        $db->close();
        return $diaries;
    }

    public static function GetDiary($id)
    {
        $db = connect::conn();
        $sql = $db->prepare("SELECT id,diary_title,diary_content,private FROM diary WHERe user_id like ? ORDER BY id DESC");
        $sql->bind_param('s', $id);
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all();

        $db->close();
        return $diaries;
    }

    public static function DeleteDiary($id)
    {
        $db = connect::conn();
        $sql = $db->prepare("DELETE FROM diary WHERE id LIKE ?");
        $sql->bind_param('s', $id);
        $sql->execute();
    }
}
