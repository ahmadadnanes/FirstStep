<?php
include 'app/includes/spl.php';
$user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css files -->
    <link rel="stylesheet" href="/app/resources/css/main.css">
    <link rel="stylesheet" href="/app/resources/css/diary.css">
    <!-- other css files -->
    <link rel="stylesheet" href="/app/resources/css/all.min.css">
    <link rel="stylesheet" href="/app/resources/css/brands.min.css">
    <link rel="stylesheet" href="/app/resources/css/normal.css">
    <title>Diary</title>
</head>

<body>
    <?php include("./app/resources/components/header.php") ?>
    <!-- start scrollup button -->
    <button class="up" id="up"><i class="fa-solid fa-arrow-up"></i></button>
    <!-- end scrollup button -->

    <!-- start diary -->
    <section>
        <div class="container">
            <form action="/diary" method="post">
                <div class="title">
                    <input type="text" name="title" id="title" required placeholder="Enter the title" style="padding-right: 60px;">
                </div>
                <div class="content">
                    <textarea name="content" id="content" cols="30" rows="10" required>
                    </textarea>
                </div>
                <div class="button">
                    <button type="submit" name="submit">
                        Submit
                    </button>
                </div>
            </form>
            <?php include("./app/resources/components/error.php") ?>
        </div>
    </section>
    <!-- end diary -->
    <?php include("./app/resources/components/footer.php") ?>
    <!-- JS -->
    <script src="/app/resources/js/main.js"></script>
</body>

</html>