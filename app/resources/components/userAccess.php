<?php
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
?>
    <div class="user">
        <span class="icon">
            <?php if (isset($_SESSION["admin"])) { ?>
                <span>
                    <a href="/admin" aria-label="user profile"><i class="fa-solid fa-user" id="user"></i></a>
                </span>
            <?php } else { ?>
                <span>
                    <a href="<?= '/user/' . $user  ?>" aria-label="user profile"><i class="fa-solid fa-user" id="user"></i></a>
                </span>
            <?php } ?>
        </span>
    </div>
<?php } ?>