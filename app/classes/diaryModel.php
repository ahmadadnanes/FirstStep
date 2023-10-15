<?php
include_once 'connect.php';
class diaryModel extends connect
{
    public static function SaveDiary($id, $title, $content)
    {
        $db = connect::conn();
        $sql = $db->prepare("INSERT INTO diary (user_id,diary_title,diary_content) VALUES (?,?,?)");
        $sql->bind_param('sss', $id, $title, $content);
        $sql->execute();

        $db->close();
        return true;
    }

    public static function GetDiary($id)
    {
        $db = connect::conn();
        $sql = $db->prepare("SELECT diary_title,diary_content FROM diary WHERe user_id like ? ORDER BY id DESC");
        $sql->bind_param('s', $id);
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all();

        $db->close();
        return $diaries;
    }
}
