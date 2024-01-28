<?php
include_once "./app/controller/DiaryController.php";
include_once "./app/controller/UserController.php";
$id = trim($_GET["id"]);
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
$view = new DiaryController();
$diary = $view->GetDiaryById($id);
// die(var_dump($diary));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("./app/resources/components/layout.php") ?>
    <title><?= $diary[0][2] ?></title>
</head>

<body class="diaryById">
    <?php include "./app/resources/components/header.php" ?>
    <div class="container">
        <div class="diary_container">
            <div class="title"><?= $diary[0][2] ?></div>
            <div class="content"><?= $diary[0][3] ?></div>
        </div>
        <div class="all_comments">
            <h4>Comments</h4>
            <?php
            $viewComment = new DiaryController();
            $comments = $viewComment->GetComm($id);
            // die(var_dump($comments));
            foreach ($comments as $comment) { ?>
                <div class="comment">
                    <div class="author">
                        <?php
                        $viewUser = new UserController();
                        $user = $viewUser->get($comment[1]);
                        echo $user;
                        ?>
                    </div>
                    <div class="content">
                        <?= $comment[3] ?>
                    </div>
                    <div class="time">
                        <?php
                        $date = new DateTime($comment[4]);
                        echo $date->format('h:i a m/d/Y');
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <form action="/comment" method="post">
            <input type="hidden" name="diary_id" value="<?= $diary[0][0] ?>">
            <input type="hidden" name="user_id" value="<?= $diary[0][1] ?>">
            <textarea name="comment" cols="30" rows="10" id="comment"></textarea>
            <button id="submit"><i class="fas fa-comment"></i></button>
        </form>
    </div>
    <?php include "./app/resources/components/footer.html" ?>
</body>
<script src="/app/resources/js/jquery.js"></script>
<script src="/app/resources/js/navbar.js"></script>
<script src="/app/resources/js/comments.js"></script>
<script src="/app.js"></script>

</html>