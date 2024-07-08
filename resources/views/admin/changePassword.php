<?php
    use app\include\csrf;
    require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('resources/views/components/layout.php') ?>
    <title>Change Password</title>
</head>

<body class="admin">
    <?php include('resources/views/components/sidebar.php') ?>
    <div class="content">
        <div class="password-form">
            <h1>Change Password</h1>
            <form action="/admin/changePassword" method="post">
                <?php csrf::create_token() ?>
                <div class="password">
                    <input type="password" placeholder=" Old Password" name="oldPass" id="OldPassword">
                    <i class="fa-solid fa-eye show" id="showOld"></i>
                </div>
                <div class="password">
                    <input type="password" placeholder=" New Password" name="newPass" min="8" id="NewPassword">
                    <i class="fa-solid fa-eye show" id="showNew"></i>
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
            <?php include('resources/views/components/error.php') ?>
        </div>
    </div>
</body>
<script src="/app.js"></script>
<script src="/resources/js/components/showButton.js"></script>

</html>