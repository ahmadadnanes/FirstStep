<?php
use app\controller\UserController;
include './app/include/time_ago.php';
if (!empty($diaries)) :
    // die(var_dump($diaries));
    foreach ($diaries as $row) :
        $start = $initial;
        $diary_id = $row[0];
        $user_id = $row[1];
        $dd = $row[4];
        if ($type == "userDiaries") {
            $dt = $row[$start];
        } else {
            $dt = $row[$start];
        }
        $dc = $row[$start += 1];
?>
        <div class="diary_container" id="<?= $diary_id ?>">
            <?php if ($row[1] == $_SESSION["id"]) : ?>
                <div class="delete">
                    <button class="xComment" id="x" name="delete" value="<?= $diary_id ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            <?php  endif ?>
            <?php if ($type == "diary") :
                $dUser = UserController::get_user($user_id);
            ?>
            <div class="author">
                <p><a href="/profile/<?= "?profile=" . $user_id ?>"><?= $dUser ?></a></p>
            </div>
            <?php else: ?>
            <div class="author">
                <p><a href="/profile/<?= "?profile=" . $user_id ?>"><?= $_SESSION["user"] ?></a></p>
            </div>
            <?php endif;?>
            <div class="content">
                <p><?= $dc ?></p>
            </div>
            <div class="combo">
                <div class="time">
                <button class="reply mb-1 p-1" onclick="location.href='/diary/show/?id=<?= $row[0] ?>'"><i class="fas fa-comment"></i></button>
                    <?php if($row[1] == $_SESSION["id"]): ?>
                        <button class="me-1 mb-1 edit" onclick="location.href='/diary/edit/?id=<?= $row[0] ?>'"><i class="fas fa-edit"></i></button>
                    <?php endif; ?>
                    <p class="date">
                        <?php
                        $time = strtotime($dd);
                        echo '<span class="mb-1">' . time_ago($time) . '</span>';
                        ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach;
else :
    if ($type == "userDiaries" && !isset($_GET["user"])) : ?>
        <div class="create text-center">
            <h4>Your Diaries are empty<a href="/diary">Create One!</a></h4>
        </div><?php  else : ?>
        <div class="create" style="text-align: center;">
            <h4 class="mb-5">This is it for now</h4>
        </div>
<?php endif;
        endif ?>