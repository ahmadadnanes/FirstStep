<?php 
use app\include\csrf;
?>
<form action="" method="post" class="add_comment">
    <?php csrf::create_token() ?>
    <?php if ($server == "diary") : ?>
        <input type="hidden" name="diary_id" value="<?= $diary[0][0] ?>">
    <?php else : ?>
        <input type="hidden" name="to_comment_id" value="<?= $comment['id'] ?>">
        <input type="hidden" name="diary_id" value="<?= $comment['diary_id'] ?>">
    <?php endif ?>
    <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
    <label for="comment"></label>
    <textarea name="comment" cols="30" rows="10" id="comment"></textarea>
    <i class="fas fa-comment" id="submit"></i>
</form>