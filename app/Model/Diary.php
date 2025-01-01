<?php
namespace app\Model;

use app\include\csrf;
use app\Model\Connect;

require 'vendor/autoload.php';
class Diary extends Connect
{
    public static function insert($id,$content, $private)
    {
        csrf::check_form_token();

        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("INSERT INTO diary (user_id,diary_content,private) VALUES (?,?,?)");
        $sql->bind_param('ssi', $id,$content, $private);

        return $sql->execute();
    }

    public static function all(): array
    {
        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERE private = 0");
        $sql->execute();
        $result = $sql->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find_by_user($id): array
    {
        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERE user_id like ? ORDER BY id DESC");
        $sql->bind_param('s', $id);
        $sql->execute();
        $result = $sql->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id): array
    {
        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERE id like ?");
        $sql->bind_param('s', $id);
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all();
        $conn->next_result();
        return $diaries;
    }

    public static function delete($id)
    {
        if(csrf::check_form_token()){
            $db = new connect();
            $conn = $db->conn();
            $sql = $conn->prepare("DELETE FROM diary WHERE id LIKE ?");
            $sql->bind_param('s', $id);
            return $sql->execute();
        }
    }

    public static function edit($id , $content , $private){
        if(csrf::check_form_token()){
            $db = new Connect();
            $conn = $db->conn();
            $sql = $conn->prepare("UPDATE diary set diary_content = ? , private = ? where id = ?");
            $sql->bind_param('sii' , $content , $private ,  $id  );
            return $sql->execute();
        }
    }

    public static function search_by_user($q){
        $q = '%' . $q . '%';
        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT id FROM users WHERE username LIKE ?");
        $sql->bind_param('s' , $q);
        $sql->execute();
        $id = $sql->get_result()->fetch_all();
        $sql = $conn->prepare("SELECT * from diary WHERE user_id = ?");
        $sql->bind_param('i' , $id[0][0]);
        $sql->execute();
        $result = $sql->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find_by_user_global($UserId): array
    {
        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM diary WHERE user_id like ? ORDER BY id DESC");
        $sql->bind_param('s', $UserId);
        $sql->execute();
        $result = $sql->get_result();
        $diaries = $result->fetch_all(MYSQLI_ASSOC);
        return $diaries;
    }

    public static function find_replies_by_comment($id)
    {
        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM comments WHERE parent_id = ?");
        $sql->bind_param('s', $id);
        $sql->execute();
        $result = $sql->get_result();
        $replies = $result->fetch_all(MYSQLI_ASSOC);

        return $replies;
    }

    public static function insert_comment($user_id, $diary_id, $comment , $parent_id = null)
    {
        if(csrf::check_form_token()){
            $db = new Connect();
            $conn = $db->conn();
            $sql = $conn->prepare("INSERT INTO comments(user_id,diary_id,comment,parent_id) VALUES (?,?,?,?)");
            $sql->bind_param('iisi', $user_id, $diary_id, $comment,$parent_id);
            $sql->execute();
            $id = $sql->insert_id;
            return $id;
        }
    }

    public static function find_comment_by_diary($id): array
    {
        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM comments WHERE diary_id = ? ORDER BY date DESC");
        $sql->bind_param('s', $id);
        $db->clearStoredResults();
        $sql->execute();
        $result = $sql->get_result();
        $comments = $result->fetch_all();
        return $comments;
    }

    public static function find_comment($id): array
    {
        $db = new Connect();
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM comments WHERE id = ?");
        $sql->bind_param('s', $id);
        $sql->execute();
        $result = $sql->get_result();
        $comment = $result->fetch_array();
        return $comment;
    }

    public static function delete_comment($id){
        if(csrf::check_form_token()){
            $db = new Connect();
            $conn = $db->conn();
            $sql = $conn->prepare("DELETE FROM comments WHERE id = ?");
            $sql->bind_param('s' , $id);
            return $sql->execute();
        }
    }

    public static function edit_comment($id ,$comment){
        if(csrf::check_form_token()){
            $db = new Connect();
            $conn = $db->conn();
            $sql = $conn->prepare('UPDATE comments SET comment = ? WHERE id = ?');
            $sql->bind_param('si' , $comment , $id);
            $sql->execute();
            return true;
        }
    }
}
