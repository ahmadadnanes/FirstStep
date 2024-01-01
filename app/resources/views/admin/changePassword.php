<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('./app/resources/components/layout.php') ?>
    <title>Change Password</title>
</head>

<body class="admin">
    <?php include('./app/resources/components/sidebar.html') ?>
    <div class="content">
        <div class="password-form">
            <h1>Change Password</h1>
            <form action="/changePassword" method="post">
                <div class="password">
                    <input type="password" placeholder="Old Password" name="oldPass">
                    <i class="fa-solid fa-eye show" id="show"></i>
                </div>
                <div class="password">
                    <input type="password" placeholder="New Password" name="newPass" min="8">
                    <i class="fa-solid fa-eye show" id="show"></i>
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
<script src="/app.js"></script>

</html>