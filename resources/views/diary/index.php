<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("resources/views/components/layout.php") ?>
    <title>Diary</title>
</head>

<body class="diary">
    <?php include("resources/views/components/header.php") ?>
    <?php include("resources/views/components/up.html") ?>
    <!-- start social diary -->
    <div class="search">
        <form action="/diary/" method="get">
            <h5>Search for Diary By User</h5> <br>
            <input type="text" class="rounded border-0 p-2 me-1" id="search" name="q"><br><br><button class="p-2">Search</button><button class="p-2 ms-1">Show All</button>
        </form>
    </div>
    <div class="social">
        <div class="container">
            <?php
            include("resources/views/components/diary_container.php")
            ?>
        </div>
    </div>
    <!-- <p class="text-center mt-1">Image by <a href="https://www.freepik.com/free-photo/sharp-colored-pencil_1476988.htm#query=pencil%20wallpaper&position=0&from_view=keyword&track=ais">Freepik</a></p> -->
    <!-- end social diary -->
    <?php include("resources/views/components/footer.html") ?>
    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/resources/js/jquery.js"></script>
    <script src="/resources/js/navbar.js"></script>
    <script src="/resources/js/up.js"></script>
    <script src="/resources/js/diary.js"></script>
</body>
</html>