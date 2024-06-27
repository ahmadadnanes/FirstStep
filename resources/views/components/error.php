<?php
if (isset($_GET["msg"])) { ?>
    <div class="error">
        <h5><?= $_GET["msg"] ?></h5>
    </div>
<?php
}
?>