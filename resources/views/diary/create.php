<?php $nav = [
    "all diaries" => [
        "/diary",
        "go to main diary page"
    ]
    ];
use app\include\csrf;
require 'vendor/autoload.php';
@session_start();
$user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './resources/views/components/layout.php' ?>
    <title>Create Your Diary</title>
</head>
<body class="diary" dir="ltr">
    <?php include './resources/views/components/header.php' ?>
    <!-- start diary -->
    <section>
        <div class="container">
            <form action="/diary/create" method="post">
                <?php csrf::create_token() ?>
                <div class="content">
                    <textarea name="content" id="content" cols="30" rows="10" required></textarea>
                </div>
                <div class="private">
                    <label for="private" class="ms-1">private</label>
                    <input type="checkbox" name="private" value="1">
                </div>
                <div class="button">
                    <button type="submit" name="submit">
                        Submit
                    </button>
                    <?php include("resources/views/components/error.php") ?>
                </div>
            </form>
        </div>
    </section>
    <!-- end diary -->
    <?php include "./resources/views/components/footer.html" ?>
<script src="/app.js"></script>
<script src="/resources/js/navbar.js"></script>
<script src="/resources/js/up.js"></script>
</body>
</html>