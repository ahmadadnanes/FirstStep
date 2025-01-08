<?php @session_start(); ?>
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
    
    <div class="search">
        <form action="/diary/ar/" method="get">
            <h5>البحث عن المذكرة من خلال المستخدم</h5> <br>
            <input type="text" class="rounded border-0 p-2 me-1" id="search" name="q"><br><br><button class="p-2">بحث</button>
            <button class="p-2 ms-1">الكل</button>
        </form>
    </div>
    <!-- start social diary -->
    <div class="social" dir="ltr">
        <h2 class="text-center mb-5">تصفح اخر المذكرات</h2>
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