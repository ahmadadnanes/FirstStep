<?php
require_once('./app/controller/DiaryController.php');
$id = $_GET["id"];
$initial = 0;
$type = "userDiaries";
$diaries = diaryModel::GetDiaryByUser($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.php") ?>
    <title>User diaries</title>
</head>

<body>
    <?php include("./app/resources/components/header.php"); ?>
    <div class="diaries">
        <div class="container">
            <div class="diary_container">
                <?php include("./app/resources/components/diary_container.php"); ?>
            </div>
        </div>
    </div>
    <?php include("./app/resources/components/footer.html") ?>
</body>

</html>