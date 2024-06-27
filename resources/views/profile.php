<?php

use app\controller\DiaryController;
include_once 'app/include/autoloader.php';

$initial = 1;
$type = "userDiaries";
$nav = [
    'Diary' => [
        '/diary',
        'go to diary'
    ],
    'Show Your Information' => [
        '/setting',
        'go to setting'
    ]
];
if (isset($_GET["user"])) {
    $id = $_GET["user"];
    $diaries = DiaryController::find_by_user($id);
} else {
    $delete = true;
    $view = new DiaryController;
    $diaries = $view->find_by_user_global($_SESSION["id"]);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('resources/views/components/layout.php') ?>
    <title>Your Diaries</title>
</head>

<body class="your">
    <!-- start header -->
    <?php include("resources/views/components/header.php") ?>
    <!-- end header -->
    <?php include("resources/views/components/up.html") ?>
    <!-- start your diaries -->
    <section>
        <div class="container" id="YourDiariesContainer">
            <?php include('resources/views/components/diary_container.php') ?>
        </div>
        <!-- <p class="text-center mt-1">Image by <a href="https://www.freepik.com/free-photo/wavy-line-colored-pencils_2533019.htm#page=8&query=pencil%20wallpaper&position=37&from_view=keyword&track=ais">Freepik</a></p> -->
    </section>
    <!-- end your diaries -->
    <?php include("resources/views/components/footer.html") ?>

    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/resources/js/navbar.js"></script>
    <script src="/resources/js/up.js"></script>
    <script src="/resources/js/YourDiaries.js"></script>
    <script src="/resources/js/jquery.js"></script>
</body>

</html>