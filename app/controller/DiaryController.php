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
        if (DiaryController::Save($id, $title, $content)) {
            header("location:/" . $_SESSION["user"]);
            exit;
        }
    }
}
