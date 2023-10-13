<?php
include 'classes/diaryModel.php';
session_start();
$id = $_SESSION["id"];
$title = $_POST["title"];
$content = $_POST["content"];


if (diaryModel::SaveDiary($id, $title, $content)) {
    header("location:../YourDiares.php");
    exit();
}
