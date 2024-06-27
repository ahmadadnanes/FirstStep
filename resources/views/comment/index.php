<?php use app\controller\UserController; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "resources/views/components/layout.php" ?>
    <title><?= $user . "'s " . "comment on diary"?></title>
</head>

<body class="commentById">
    <?php include_once "resources/views/components/header.php" ?>
    <div class="container">
        <div class="comment">
            <?php if ($comment[0][1] == $_SESSION["id"]) : ?>
                <div class="delete">
                    <button class="xComment" id="x" name="delete" value="<?= $diary_id ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            <?php  endif ?>
            <div class="author">
                <a href="/profile/<?= "?user=" . $comment[0][1] ?>"><?= $user ?></a>
            </div>
            <div class="content">
                <?= $comment[0][3] ?>
            </div>
            <div class="time">
                <?php
                if($comment[0][1] == $_SESSION["id"]): ?>
                    <button class="me-1 edit"><i class="fas fa-edit"></i></button>
                <?php endif;
                try {
                    $date = $comment[0][4];
                    echo time_ago($date);
                } catch (Exception $e) {
                    echo "0:00 00/00/0000";
                }
                ?>
            </div>
        </div>
        <div class="all_comments">
            <h1>Replies</h1>
            <?php foreach($replies as $reply):
                $user = UserController::get_user($reply[1])
            ?>
                <div class='comment position-relative'> 
                    <div class='author'>
                        <a href='/profile/?user=<?= $reply[0][1] ?>'><?= $user ?></a>
                    </div>
                    <div class='content'>
                        <?= $reply[4] ?>
                    </div>
                    <div class='combo'>
                        <div class='time'>
                            <p class="date">
                                <?php
                                $time = strtotime($reply[5]);
                                echo '<span class="mb-1">' . time_ago($time) . '</span>';
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <?php include_once("resources/views/components/add_comment.php") ?>
    </div>
    <script src="/app.js"></script>
    <script src="/resources/js/jquery.js"></script>
    <script src="/resources/js/navbar.js"></script>
    <script src="/resources/js/up.js"></script>
    <script src="/resources/js/comments.js"></script>
</body>

</html>