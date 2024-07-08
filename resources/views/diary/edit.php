<?php
    $nav = [
        'diary' => [
            '/diary',
            'go to diary'
        ]
        ];
    use app\include\csrf;
    require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './resources/views/components/layout.php' ?>
    <title>Edit Your Diary</title>
</head>
<body class="diary" dir="ltr">
    <?php include './resources/views/components/header.php' ?>
        <!-- start diary -->
    <section>
        <div class="container">
            <form action="/diary/edit/?<?= "id=" . $id ?>" method="post">
                <?php csrf::create_token() ?>
                <div class="content">
                    <textarea name="content" id="content" cols="30" rows="10" required><?= $diary[0][2] ?></textarea>
                </div>
                <div class="private">
                    <label for="private" class="ms-1">private</label>
                    <input type="checkbox" <?= $diary[0][3] ? "checked" : "" ?>  name="private" value="1">
                </div>
                <div class="button">
                    <button type="submit" name="submit">
                        Update
                    </button>
                    <?php include("resources/views/components/error.php") ?>
                </div>
            </form>
        </div>
    </section>
    <!-- end diary -->
    <?php include './resources/views/components/footer.html' ?>
    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/resources/js/jquery.js"></script>
    <script src="/resources/js/navbar.js"></script>
    <script src="/resources/js/up.js"></script>
    <script src="/resources/js/diary.js"></script>
</body>
</html>