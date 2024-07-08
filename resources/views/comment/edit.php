<?php

use app\controller\CommentController;
use app\include\csrf;
use app\include\Validation;

require 'vendor/autoload.php';
$id = Validation::validate_text($_GET["id"]);
if($id){
    $comment = CommentController::find_comment($id);
}
$nav = ['dairy' => ['/diary' , 'go to diary']];
// die(var_dump($comment));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './resources/views/components/layout.php' ?>
    <title>Edit Comment</title>
</head>
<body class="diary">
    <?php include './resources/views/components/header.php' ?>
    <section>
        <div class="container">
            <form action="/comment/edit" method="post">
                <?php csrf::create_token() ?>
                <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                <div class="content">
                    <textarea name="comment" id="content" cols="30" rows="10" required><?= $comment['comment'] ?></textarea>
                </div>
                <div class="button">
                    <button type="submit" name="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </section>
    <?php include './resources/views/components/footer.html' ?>
</body>
<script src="/app.js"></script>
<script src="/resources/js/navbar.js"></script>
</html>