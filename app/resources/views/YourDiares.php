<?php
include_once "./app/controller/DiaryController.php";
include_once "./app/controller/UserController.php";
$initial = 2;
$type = "userDiaries";
$nav = [
    'Logout' => [
        '/logout',
        'logout'
    ],
    'Diary' => [
        '/diary',
        'go to diary'
    ]
];
if (isset($_GET["user"])) {
    $id = $_GET["user"];
    $diaries = DiaryController::GetDiaryByUser($id);
} else {
    $delete = true;
    $view = new DiaryController;
    $diaries = $view->Get($_SESSION["id"]);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('./app/resources/views/components/layout.html') ?>
    <title>Your Diaries</title>
</head>

<body class="your">
    <!-- start header -->
    <?php include("./app/resources/views/components/header.php") ?>
    <!-- end header -->
    <?php include("./app/resources/views/components/up.html") ?>
    <!-- start your diaries -->
    <section>
        <div class="container" id="YourDiariesContainer">
            <?php include('./app/resources/views/components/diary_container.php') ?>
        </div>
        <p class="text-center mt-1">Image by <a href="https://www.freepik.com/free-photo/wavy-line-colored-pencils_2533019.htm#page=8&query=pencil%20wallpaper&position=37&from_view=keyword&track=ais">Freepik</a></p>
    </section>
    <!-- end your diaries -->
    <?php include("./app/resources/views/components/footer.html") ?>

    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/app/resources/js/navbar.js"></script>
    <script src="/app/resources/js/up.js"></script>
    <script src="/app/resources/js/YourDiaries.js"></script>
</body>
<script src="/app.js"></script>

</html>