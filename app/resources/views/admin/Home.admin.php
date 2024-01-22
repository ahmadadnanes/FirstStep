<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.php") ?>
    <title>Welcome admin <?= $_SESSION["user"] ?></title>
</head>

<body class="admin">
    <?php include('./app/resources/components/sidebar.html') ?>
    <div class="content">
    </div>
</body>

</html>