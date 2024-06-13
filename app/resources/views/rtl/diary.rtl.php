<?php
include_once("./app/controller/DiaryController.php");
include_once("./app/controller/UserController.php");
@session_start();
$user = $_SESSION["user"];
$initial = 1;
$type = "diary";
$diaries = DiaryController::all();
$nav = [
    'تسجيل الخروج' =>[
        '/logout/?lang=ar',
        'logout'
    ]
]
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.html") ?>
    <title>المذكرة</title>
</head>

<body class="diary">
    <?php include("./app/resources/components/header.php") ?>
    <?php include("./app/resources/components/up.html") ?>

    <!-- start diary -->
    <section>
        <div class="container">
            <form action="/diary" method="post">
                <div class="title">
                    <input type="text" name="title" id="title" required placeholder="أدخل العنوان" style="padding-right: 60px;">
                </div>
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
                    <?php include("./app/resources/components/error.php") ?>
                </div>
            </form>
        </div>
    </section>
    <!-- end diary -->
    <!-- start social diary -->
    <div class="social">
        <h2>تصفح اخر المذكرات</h2>
        <div class="container">
            <?php
            include("./app/resources/components/diary_container.php")
            ?>
        </div>
    </div>
    <p class="text-center mt-1">Image by <a href="https://www.freepik.com/free-photo/sharp-colored-pencil_1476988.htm#query=pencil%20wallpaper&position=0&from_view=keyword&track=ais">Freepik</a></p>
    <!-- end social diary -->
    <?php include("./app/resources/components/footer.html") ?>
    <!-- JS -->
    <script src="/app/resources/js/navbar.js"></script>
    <script src="/app/resources/js/up.js"></script>
</body>
<script src="/app.js"></script>

</html>