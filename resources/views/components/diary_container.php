<?php
use app\controller\UserController;
use app\include\csrf;
include './app/include/time_ago.php';
if (!empty($diaries)) :
    foreach ($diaries as $row) :
        $diary_id = $row['id'];
        $user_id = $row['user_id'];
        $dd = $row['date'];
        $dc = $row['diary_content'];
?>
        <div class="diary_container" id="<?= $diary_id ?>">
            <?php if ($user_id == $_SESSION["id"]) : ?>
                <div class="delete">
                    <form action="" method="post" class="delete_form">
                        <?php csrf::create_token() ?>
                        <button class="x" id="x" name="delete" value="<?= $diary_id ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
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
                <button class="reply mb-1 p-1" onclick="location.href='/diary/show/<?= $diary_id ?>'"><i class="fas fa-comment"></i></button>
                    <?php if($user_id == $_SESSION["id"]): ?>
                        <button class="me-1 mb-1 edit" onclick="location.href='/diary/edit/<?= $row['id'] ?>'"><i class="fas fa-edit"></i></button>
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
            <h4>Your Diaries are empty<a href="/diary/create">Create One!</a></h4>
        </div><?php  else : ?>
        <div class="create" style="text-align: center;">
            <h4 class="mb-5">This is it for now</h4>
        </div>
<?php endif;
        endif ?>