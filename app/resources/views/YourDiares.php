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
    <?php include('./app/resources/components/layout.php') ?>
    <title>Your Diaries</title>
</head>

<body class="your">
    <!-- start header -->
    <nav>
        <div class="container">
            <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px" alt="logo"></a>

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

            <?php
            if (!empty($result)) {
                // die(var_dump($result));
                foreach ($result as $row) {
                    $id = $row[0];
                    $dt = $row[1];
                    $dc = $row[2];
            ?>
                    <div class="diary_container">
                        <div class="delete">
                            <form action="/diary" method="post">
                                <button class="x" name="delete" value="<?= $id ?>">
                                    <i class="fa-solid fa-square-xmark"></i>
                                </button>
                            </form>
                        </div>
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
    <?php include("./app/resources/components/footer.html") ?>
    <!-- JS -->
    <script src="/app/resources/js/main.js"></script>
</body>

</html>