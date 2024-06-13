<?php
include_once 'connect.php';
class diaryModel extends connect
{
    public static function SaveDiary($id, $title, $content, $private): bool
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("INSERT INTO diary (user_id,diary_title,diary_content,private) VALUES (?,?,?,?)");
        $sql->bind_param('sssi', $id, $title, $content, $private);

        return $sql->execute();
    }

    public static function all(): array
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERE private = 0");
        $sql->execute();
        $result = $sql->get_result();

        return $result->fetch_all();
    }

    public static function GetDiary($id): array
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERe user_id like ? ORDER BY id DESC");
        $sql->bind_param('s', $id);
        $sql->execute();
        $result = $sql->get_result();
        return $result->fetch_all();
    }

    public static function GetDiaryById($DiaryId): array
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
        return $sql->execute();
    }

    public static function GetDiaryByUser($UserId): array
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERE user_id like ? and private = 0 ORDER BY id DESC");
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

    public static function getCommentsByDiary($diary_id): array
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

    public static function getCommentById($comment_id): array
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

    public static function GetReplies($comment_id)
    {
        $db = new connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM replies WHERE to_comment_id = ?");
        $sql->bind_param('s', $comment_id);
        $result = $sql->get_result();

        return $result;
    }
}
