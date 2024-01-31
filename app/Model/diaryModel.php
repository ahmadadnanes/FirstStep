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

    public static function GetDiaryById($DiaryId)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERE id like ?");
        $sql->bind_param('s', $DiaryId);
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all();
        $conn->next_result();
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

    public static function storeComment($user_id, $diary_id, $comment)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("INSERT INTO comments(user_id,diary_id,comment) VALUES (?,?,?)");
        $sql->bind_param('iis', $user_id, $diary_id, $comment);
        $sql->execute();
        $id = $sql->insert_id;
        return $id;
    }

    public static function getCommentsByDiary($diary_id)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM comments WHERE diary_id = ? ORDER BY date DESC");
        $sql->bind_param('s', $diary_id);
        $db->clearStoredResults();
        $sql->execute();
        $result = $sql->get_result();
        $comments = $result->fetch_all();
        return $comments;
    }

    public static function getCommentById($comment_id)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM comments WHERE id = ?");
        $sql->bind_param('s', $comment_id);
        $sql->execute();
        $result = $sql->get_result();
        $comment = $result->fetch_all();
        return $comment;
    }
}
