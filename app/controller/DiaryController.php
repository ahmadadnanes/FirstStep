<?php
include_once './app/classes/diaryModel.php';
session_start();
class DiaryController extends diaryModel
{
    public static function Save($id, $title, $content)
    {
        $result = diaryModel::SaveDiary($id, $title, $content);
        return $result;
    }

    public static function Get($id)
    {
        $array = diaryModel::GetDiary($id);
        return $array;
    }

    public static function Filter($title, $content)
    {
        if (strlen($title) > 0 && strlen($title) < 80) {
            if (strlen($content) > 0 && strlen($title) < 300) {
                return true;
            } else {
                return "content can't exceed 300 character";
            }
        } else {
            return "title can't exceed 80 character";
        }
    }
}

if ($_SERVER["REQUEST_URI"] == "/diary") {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_SESSION["id"])) {
            require "./app/resources/views/diary.php";
        } else {
            $actual_link = $_SERVER["REQUEST_URI"];
            header("location:/login/?diary");
            exit;
        }
    } else {
        $id = $_SESSION["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $filter = DiaryController::Filter($title, $content);

        if (is_bool($filter)) {
            DiaryController::Save($id, $title, $content);
            header("location: /user/" . $_SESSION["user"]);
        } else {
            header("location: /diary/?msg=$filter");
        }
        exit;
    }
}
