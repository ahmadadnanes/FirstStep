<?php
include_once "./app/controller/DiaryController.php";

$view = new DiaryController;
$result = $view->Get($_SESSION["id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css files -->
    <link rel="stylesheet" href="/app/resources/css/main.css">
    <link rel="stylesheet" href="/app/resources/css/YourDiares.css">
    <!-- other css files -->
    <link rel="stylesheet" href="/app/resources/css/all.min.css">
    <link rel="stylesheet" href="/app/resources/css/brands.min.css">
    <link rel="stylesheet" href="/app/resources/css/normal.css">
    <title>Your Diaries</title>
</head>

<body>
    <!-- start header -->
    <nav>
        <div class="container">
            <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px"></a>

            <div class="normal-bar">
                <a href="/logout">Logout</a>
                <a href="/diary">Diary</a>
            </div>

            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="/app/resources/img/bars-solid.svg" id="nav_button">
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

    <!-- start scrollup button -->
    <button class="up" id="up"><i class="fa-solid fa-arrow-up"></i></button>
    <!-- end scrollup button -->

    <!-- start your diares -->
    <section>
        <div class="container">

            <?php
            if (!empty($result)) {
                foreach ($result as $key => $row) {
                    $dt = $row[$key];
                    $dc = $row[$key]; ?>
                    <div class="diary_container">
                        <div class="title">
                            <p><?= $dt ?></p>
                        </div>
                        <div class="content">
                            <p><?= $dc ?></p>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="create" style="text-align: center;">
                    <h4>Your Diaries are empty<a href="/diary">Create One!</a></h4>
                </div><?php } ?>

        </div>
    </section>
    <!-- end your diares -->
    <?php include("./app/resources/components/footer.php") ?>
    <!-- JS -->
    <script src="/app/resources/js/main.js"></script>
</body>

</html>