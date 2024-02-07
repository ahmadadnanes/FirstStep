<?php
include_once './app/Model/diaryModel.php';
include_once './app/controller/UserController.php';
@session_start();
class DiaryController extends diaryModel
{
    public static function Save($id, $title, $content, $private)
    {
        return diaryModel::SaveDiary($id, $title, $content, $private);
    }

    public static function Get($id)
    {
        return diaryModel::GetDiary($id);
    }

    public static function all()
    {
        return diaryModel::all();
    }

    public static function delete($diary_id)
    {
        diaryModel::DeleteDiary($diary_id);
    }

    public static function Filter($title, $content)
    {
        if (strlen($title) > 0 && strlen($title) < 80) {
            if (strlen($content) > 0 && strlen($content) < 300) {
                return true;
            } else {
                return "content can't exceed 300 character";
            }
        } else {
            return "title can't exceed 80 character";
        }
    }

    public static function GetDiariesByAuthor($id)
    {
        return diaryModel::GetDiaryByUser($id);
    }

    public static function storeComm($user_id, $diary_id, $comment)
    {
        $id = diaryModel::storeComment($user_id, $diary_id, $comment);
        if (is_numeric($id)) {
            $viewUser = new UserController();
            $user = $viewUser->get($user_id);
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone("Asia/Amman"));
            $date = $date->format('h:i a m/d/Y');
            echo "
                <div class='comment' onclick='location.href=`/comment/?id=$id`'> 
                    <div class='author'>
                        <a href='/user/?user=$user_id'>$user</a>
                    </div>
                    <div class='content'>
                        $comment
                    </div
                    <div class='time'>
                        $date
                    </div>
                </div>";
        }
    }

    public static function GetCommentById($comment_id)
    {
        return diaryModel::getCommentById($comment_id);
    }

    public static function GetComm($diary_id)
    {
        return diaryModel::getCommentsByDiary($diary_id);
    }

    public static function GetRep($comment_id)
    {
    }
}
$server = explode('/', $_SERVER["REQUEST_URI"])[1];
if ($server == "diary") {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_SESSION["id"])) {
            require "./app/resources/views/diary.php";
        } else {
            $actual_link = $_SERVER["REQUEST_URI"];
            header("location:/login/?diary");
            exit;
        }
    } else {
        if (isset($_POST["delete"])) {
            diaryModel::DeleteDiary($_POST["delete"]);
            header("location: /user/" . $_SESSION["user"]);
        } else {
            if (isset($_SESSION["id"], $_POST["title"], $_POST["content"])) {
                $id = $_SESSION["id"];
                $title = $_POST["title"];
                $content = $_POST["content"];
                if (isset($_POST["private"])) {
                    $private = $_POST["private"];
                } else {
                    $private = 0;
                }
                $filter = DiaryController::Filter($title, $content);
                if (is_bool($filter)) {
                    DiaryController::Save($id, $title, $content, $private);
                    header("location: /user/" . $_SESSION["user"]);
                } else {
                    header("location: /diary/?msg=$filter");
                }
                exit;
            } else {
                header("location: /diary/?msg=Error");
            }
        }
    }
} else if ($server == "addcomment") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["user_id"], $_POST["diary_id"], $_POST["comment"])) {
            $user_id = $_POST["user_id"];
            $diary_id = $_POST["diary_id"];
            $comment = $_POST["comment"];
            return DiaryController::storeComm($user_id, $diary_id, $comment);
        } else {
            header("location: /diaryById?id=" . $_POST["diary_id"]);
        }
    }
}
