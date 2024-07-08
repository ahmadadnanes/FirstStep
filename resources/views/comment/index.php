<?php use app\controller\UserController; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

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
            <?php if ($comment['user_id'] == $_SESSION["id"]) : ?>
                <div class="delete">
                    <form action="" class="delete_form" method="post">
                        <button class="xComment" id="x" name="delete" value="<?= $comment['diary_id'] ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            <?php  endif ?>
            <div class="author">
                <a href="/profile/<?= "?user=" . $comment['user_id'] ?>"><?= $user ?></a>
            </div>
            <div class="content">
                <?= $comment['comment'] ?>
            </div>
            <div class="time">
                <?php
                if($comment['user_id'] == $_SESSION["id"]): ?>
                    <button class="me-1 edit" onclick="location.href='/comment/edit/?id=<?= $id ?>'"><i class="fas fa-edit"></i></button>
                <?php endif;
                try {
                    $date = $comment['date'];
                    echo time_ago($date);
                } catch (Exception $e) {
                    echo "0:00 00/00/0000";
                }
                ?>
            </div>
            <?php include './resources/views/components/error.php' ?>
        </div>
        <div class="all_comments">
            <h1>Replies</h1>
            
            <?php if(!empty($replies)) : foreach($replies as $reply):
                $user = UserController::get_user($reply['user_id'])
            ?>
                <div class='comment position-relative'> 
                    <div class='author'>
                        <a href='/profile/?user=<?= $reply['user_id'] ?>'><?= $user ?></a>
                    </div>
                    <div class='content'>
                        <?= $reply['comment'] ?>
                    </div>
                        <div class='time'>
                            <button class='reply mb-1 p-1' onclick='location.href=`/comment/?id=<?= $id ?>`'><i class='fa-solid fa-comment'></i></button>
                            <?php if($reply['user_id'] == $_SESSION['id']) : ?>
                                <button class='me-1 edit' onclick="location.href='/comment/edit/?id=<?= $id ?>'"><i class='fas fa-edit'></i></button>
                            <?php endif; ?>
                                <?php
                                $time = strtotime($reply['date']);
                                echo '<span>' . time_ago($time) . '</span>';
                                ?>
                        </div>
                </div>
            <?php endforeach; endif;  ?>
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