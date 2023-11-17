<?php
include_once './app/Model/diaryModel.php';
session_start();
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
        }
    }
}
