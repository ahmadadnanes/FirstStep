<?php
include_once "./app/controller/DiaryController.php";
include_once "./app/controller/UserController.php";
if (isset($_GET["id"])) {
    $id = htmlspecialchars($_GET["id"]);
    $comment = DiaryController::GetCommentById($id);
    // die(var_dump($comment));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./app/resources/components/layout.html" ?>
    <title><?= $comment[0][3] ?></title>
</head>

<body class="commentById">
    <?php include_once "./app/resources/components/header.php" ?>
    <div class="container">
        <div class="comment">
            <div class="author">
                <?php
                $viewUser = new UserController();
                $user = $viewUser->get($comment[0][1]);
                ?>
                <a href="/user/<?= "?user=" . $comment[0][1] ?>"><?= $user ?></a>
            </div>
            <div class="content">
                <?= $comment[0][3] ?>
            </div>
            <div class="time">
                <?php
                $date = new DateTime($comment[0][4]);
                echo $date->format('h:i a m/d/Y');
                ?>
            </div>
        </div>
        <?php include_once("./app/resources/components/add_comment.php") ?>
    </div>
</body>

</html>