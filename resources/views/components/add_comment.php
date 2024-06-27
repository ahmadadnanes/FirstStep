<form action="" method="post" class="add_comment">
    <?php if ($server == "diary") : ?>
        <input type="hidden" name="diary_id" value="<?= $diary[0][0] ?>">
        <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
    <?php else : ?>
        <input type="hidden" name="user_id" value="<?= $_SESSION["id"] ?>">
        <input type="hidden" name="to_comment_id" value="<?= $comment[0][0] ?>">
        <input type="hidden" name="diary_id" value="<?= $comment[0][2] ?>">
    <?php endif ?>
    <label for="comment"></label>
    <textarea name="comment" cols="30" rows="10" id="comment"></textarea>
    <i class="fas fa-comment" id="submit"></i>
</form>