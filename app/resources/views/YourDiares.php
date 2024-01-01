<?php
include_once "./app/controller/DiaryController.php";
$initial = 0;
$type = "userDiaries";
if (isset($_GET["user"])) {
    $id = $_GET["user"];
    $diaries = diaryModel::GetDiaryByUser($id);
} else {
    $delete = true;
    $view = new DiaryController;
    $diaries = $view->Get($_SESSION["id"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('./app/resources/components/layout.php') ?>
    <title>Your Diaries</title>
</head>

<body class="your">
    <!-- start header -->
    <nav>
        <div class="container">
            <?php include('./app/resources/components/logo.html') ?>
            <div class="normal-bar">
                <a href="/logout">Logout</a>
                <a href="/diary">Diary</a>
            </div>
            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="/app/resources/img/bars-solid.svg" id="nav_button" alt="bars">
                    </span>
                    <ul id="nav_ul">
                        <li>
                            <a href="/logout">Logout</a>
                        </li>
                        <li>
                            <a href="/diary">Diary</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- end header -->
    <?php include("./app/resources/components/up.html") ?>
    <!-- start your diares -->
    <section>
        <div class="container">
            <?php include('./app/resources/components/diary_container.php') ?>
        </div>
        <p class="text-center mt-1">Image by <a href="https://www.freepik.com/free-photo/wavy-line-colored-pencils_2533019.htm#page=8&query=pencil%20wallpaper&position=37&from_view=keyword&track=ais">Freepik</a></p>
    </section>
    <!-- end your diares -->
    <?php include("./app/resources/components/footer.html") ?>

    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/app/resources/js/navbar.js"></script>
    <script src="/app/resources/js/up.js"></script>
    <script src="/app/resources/js/YourDiaries.js"></script>
</body>

</html>