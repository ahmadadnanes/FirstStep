<?php
if (!empty($diaries)) {
    foreach ($diaries as $row) {
        $start = $initial;
        $diary_id = $row[0];
        $user_id = $row[$start];
        $dt = $row[$start += 1];
        $dc = $row[$start += 1];
        $dd = $row[5];
?>
        <div class="diary_container" onclick="location.href='/diaryById/?id=<?= $diary_id ?>'">
            <?php if (isset($delete)) { ?>
                <div class="delete">
                    <form action="/diary" method="post" id="deleteForm">
                        <button class="x" name="delete" value="<?= $diary_id ?>">
                            <i class="fa-solid fa-square-xmark"></i>
                        </button>
                    </form>
                </div>
            <?php } ?>
            <div class="title">
                <p><?= $dt ?></p>
            </div>
            <div class="content">
                <p><?= $dc ?></p>
            </div>
            <?php if ($type == "diary") {
                $dUser = UserController::getUser($user_id);
            ?>
                <div class="author">
                    <p>by: <a href="/user/<?= "?user=" . $user_id ?>"><?= $dUser ?></a></p>
                </div>
            <?php } ?>
            <div class="time">
                <?php
                $date = new DateTime($dd);
                echo " <p> Date: " . $date->format('h:i a m/d/Y') . "</p>";
                ?>
            </div>
        </div>
    <?php }
} else {
    if ($type == "userDiaries") { ?>
        <div class="create text-center">
            <h4>Your Diaries are empty<a href=" /diary">Create One!</a></h4>
        </div><?php } else { ?>
        <div class="create" style="text-align: center;">
            <h4 class="mb-5">This is it for now</h4>
        </div>
<?php }
        } ?>