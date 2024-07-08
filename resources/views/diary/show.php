<?php
@session_start();
use app\controller\{DiaryController , UserController};
use app\include\csrf;

include_once 'app/include/time_ago.php';
require 'vendor/autoload.php';
$server = explode('/', $_SERVER["REQUEST_URI"])[1];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("resources/views/components/layout.php") ?>
    <title><?= $author . "'s " . "Diary" ?></title>
</head>

<body class="diaryById">
    <?php include "resources/views/components/header.php" ?>
    <div class="container">
        <div class="diary_container">
            <div class="author"><?= $author ?></div>
            <div class="content"><?= $diary[0][2] ?></div>
        </div>
        <div class="all_comments">
            <h4 class="my-5">Comments</h4>
            <?php
            $viewComment = new DiaryController();
            $comments = $viewComment->find_comment_by_diary($id);
            // die(var_dump($comments));
            foreach ($comments as $comment) { ?>
                <div class="comment position-relative" id="<?= $comment[0] ?>">
                    <?php if ($comment[1] == $_SESSION["id"]) : ?>
                        <div class="delete">
                            <form action="" method="post" class="delete_form">
                                <?php csrf::create_token() ?>
                                <button class="xComment" name="delete" value="<?= $comment[0] ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    <?php  endif ?>
                    <div class="author">
                        <?php
                        $viewUser = new UserController();
                        $user = $viewUser->get_user($comment[1]);
                        ?>
                        <a href="/profile/<?= "?user=" . $comment[1] ?>"><?= $user ?></a>
                    </div>
                    <div class="content">
                        <?= $comment[3] ?>
                    </div>
                    <div class="time">
                    <button class="reply" onclick="location.href='/comment/?id=<?= $comment[0] ?>'"><i class="fas fa-comment"></i></button>
                        <?php if($comment[1] == $_SESSION["id"]): ?>
                            <button class="me-1 edit" onclick="location.href='/comment/edit/?id=<?= $comment[0] ?>'"><i class="fas fa-edit"></i></button>
                        <?php endif;
                        try {
                            $date = $comment[4];
                            echo '<span>' .  time_ago($comment[4]) .  '</span>' ;
                        } catch (Exception $e) {
                            echo "0:00 00/00/0000";
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php include_once("resources/views/components/add_comment.php") ?>
    </div>
    <?php include "resources/views/components/footer.html" ?>
</body>
<script src="/app.js"></script>
<script src="/resources/js/jquery.js"></script>
<script src="/resources/js/navbar.js"></script>
<script src="/resources/js/comments.js"></script>

</html>