<?php
include './app/classes/diaryModel.php';
session_start();
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
        if (diaryModel::SaveDiary($id, $title, $content)) {
            header("location:/" . $_SESSION["user"]);
            exit;
        }
    }
}
