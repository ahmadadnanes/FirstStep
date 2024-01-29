<?php
include_once './app/Model/diaryModel.php';
include_once './app/controller/UserController.php';
@session_start();
class DiaryController extends diaryModel
{
    public static function Save($id, $title, $content, $private)
    {
        $result = diaryModel::SaveDiary($id, $title, $content, $private);
        return $result;
    }

    public static function Get($id)
    {
        $array = diaryModel::GetDiary($id);
        return $array;
    }

    public static function all()
    {
        $array = diaryModel::all();
        return $array;
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
        if (diaryModel::storeComment($user_id, $diary_id, $comment)) {
            $viewUser = new UserController();
            $user = $viewUser->get($user_id);
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone("Asia/Amman"));
            $date = $date->format('h:i a m/d/Y');
            echo "
            <div class='comment'> 
                <div class='author'>
                    $user
                </div>
                <div class='content'>
                    $comment
                </div
                <div class='time'>
                    $date
                </div>
            </div>";
        } else {
            echo "Error";
        }
    }

    public static function GetComm($diary_id)
    {
        return DiaryController::getCommentsByDiary($diary_id);
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
} else if ($server == "comment") {
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
