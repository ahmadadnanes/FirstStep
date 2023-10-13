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
}
