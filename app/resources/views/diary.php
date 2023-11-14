<?php
include_once("./app/controller/DiaryController.php");
include_once("./app/controller/UserController.php");
if (!isset($_SESSION)) {
    session_start();
}
$user = $_SESSION["user"];
$diaries = DiaryController::all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.php") ?>
    <title>Diary</title>
</head>

<body class="diary">
    <?php include("./app/resources/components/header.php") ?>
    <?php include("./app/resources/components/up.html") ?>

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
                <div class="private">
                    <label for="private">private</label>
                    <input type="checkbox" name="private" value="1">
                </div>
                <div class="button">
                    <button type="submit" name="submit">
                        Submit
                    </button>
                    <?php include("./app/resources/components/error.php") ?>
                </div>
            </form>
        </div>
    </section>
    <!-- end diary -->
    <!-- start social diary -->
    <div class="social">
        <h2>Explore other Diaries</h2>
        <div class="container">
            <?php
            if (!empty($diaries)) {
                foreach ($diaries as $row) {
                    $id = $row[1];
                    $dt = $row[2];
                    $dc = $row[3];
                    $dUser = UserController::get($id);
            ?>
                    <div class="diary_container">
                        <div class="title">
                            <p><?= $dt ?></p>
                        </div>
                        <div class="content">
                            <p><?= $dc ?></p>
                        </div>
                        <div class="author">
                            <p>by: <a href="/diaries/<?= "?id=" . $id ?>"><?= $dUser ?></a></p>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="create" style="text-align: center;">
                    <h4 class="mb-5">This is it for now</h4>
                </div><?php } ?>
        </div>
    </div>
    <p class="text-center mt-1">Image by <a href="https://www.freepik.com/free-photo/sharp-colored-pencil_1476988.htm#query=pencil%20wallpaper&position=0&from_view=keyword&track=ais">Freepik</a></p>
    <!-- end social diary -->
    <?php include("./app/resources/components/footer.html") ?>
    <!-- JS -->
    <script src="/app/resources/js/main.js"></script>
</body>

</html>