<?php
use app\controller\DiaryController;
include "app/include/autoloader.php";
@session_start();
$user = $_SESSION["user"];
$initial = 1;
$type = "diary";
$diaries = DiaryController::all();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("resources/views/components/layout.php") ?>
    <title>المذكرة</title>
</head>

<body class="diary">
    <?php include("resources/views/components/header.php") ?>
    <?php include("resources/views/components/up.html") ?>

    <!-- start diary -->
    <section>
        <div class="container">
            <form action="/diary" method="post">
                <div class="content">
                    <textarea name="content" id="content" cols="30" rows="10" required>
                    </textarea>
                </div>
                <div class="private">
                    <label for="private">خاص</label>
                    <input type="checkbox" name="private" value="1">
                </div>
                <div class="button">
                    <button type="submit" name="submit">
                        ادخال
                    </button>
                    <?php include("resources/views/components/error.php") ?>
                </div>
            </form>
        </div>
    </section>
    <!-- end diary -->
    <!-- start social diary -->
    <div class="social" dir="ltr">
        <h2>تصفح اخر المذكرات</h2>
        <div class="container">
            <?php
            include("resources/views/components/diary_container.php")
            ?>
        </div>
    </div>
    <p class="text-center mt-1">Image by <a href="https://www.freepik.com/free-photo/sharp-colored-pencil_1476988.htm#query=pencil%20wallpaper&position=0&from_view=keyword&track=ais">Freepik</a></p>
    <!-- end social diary -->
    <?php include("resources/views/components/rtl/footer.rtl.html") ?>
    <!-- JS -->
    <script src="/resources/js/navbar.js"></script>
    <script src="/resources/js/up.js"></script>
</body>

</html>