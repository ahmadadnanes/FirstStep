<?php

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    session_start();
    $user = $_SESSION["user"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css file -->
    <link rel="stylesheet" href="/app/resources/css/main.css">
    <link rel="stylesheet" href="/app/resources/css/Recomended psy.css">
    <!-- other css files -->
    <link rel="stylesheet" href="/app/resources/css/all.min.css">
    <link rel="stylesheet" href="/app/resources/css/normal.css">
    <link rel="stylesheet" href="/app/resources/css/brands.min.css">
    <title>Recommended Psychologist</title>
</head>

<body bgcolor="#DCDCDC">

    <!-- start header -->
    <nav>
        <div class="container">
            <div class="user">
                <a href="<?= '/' . $user ?>"><?= $user ?></a>
            </div>
            <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px"></a>

            <div class="normal-bar">
                <a href="/logout">Logout</a>
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

                    </ul>
                </div>
            </div>

        </div>


    </nav>
    <!-- end header -->

    <!-- start scrollup button -->
    <button class="up" id="up"><i class="fa-solid fa-arrow-up"></i></button>
    <!-- end scrollup button -->

    <!-- start Recomended psy -->
    <section>
        <div class="container">
            <form action="/psy/" method="get" id="form">
                <div class="form_container">
                    <label for="gov">Choose a governorate:</label><br><br>

                    <select name="gov" id="gov">
                        <?php
                        if (isset($_GET["gov"])) { ?>
                            <option value="<?= $_GET["gov"] ?>" selected disabled><?= $_GET["gov"] ?></option>
                        <?php } ?>
                        <option value="Amman">Amman</option>
                        <option value="Zarqa">Zarqa</option>
                        <option value="Irbid">Irbid</option>
                    </select><br><br>
                    <button type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
    <div class="map">
        <div class="container">
            <h1 style="text-align: center;">Your Map</h1>
            <div style="text-decoration:none; overflow:hidden;max-width:100%;width:1200px;height:500px;">
                <?php if (isset($_GET["gov"])) { ?>

                    <?php if ($_GET["gov"] == "Amman") { ?>
                        <div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=اطباء+نفسسين+عمان&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="embedded-map-code" href="https://www.bootstrapskins.com/themes" id="authmaps-data">premium bootstrap themes</a>
                    <?php } else if ($_GET["gov"] == "Zarqa") { ?>
                        <div style="max-width:100%;overflow:hidden;color:red;width:1200px;height:500px;">
                            <div id="my-map-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=اطباء+نفسسسين+زرقاء&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="googlecoder" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="get-data-for-embed-map">premium bootstrap themes</a>
                        </div>
                    <?php } else { ?>
                        <div style="max-width:100%;overflow:hidden;color:red;width:1200px;height:500px;">
                            <div id="my-map-display" style="height:100%; width:100%;max-width:100%;">
                                <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=اطباء+نفسسسين+اربدء&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                            </div><a class="googlecoder" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="get-data-for-embed-map">premium bootstrap themes</a>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=اطباء+نفسسين+عمان&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="embedded-map-code" href="https://www.bootstrapskins.com/themes" id="authmaps-data">premium bootstrap themes</a <?php } ?> </div>
            </div>
        </div>
        <!-- end Recomended psy -->

        <!-- start footer -->
        <footer>
            <div class="footer_container">
                <h2>Follow Me</h2>
                <ul class="footer_ul">
                    <li><a href="https://www.linkedin.com/in/ahmad-istaitieh-64a635248/"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=100002178974914"><i class=" fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://github.com/ahmadadnanes"><i class="fa-brands fa-github"></i></a></li>
                </ul>
                <h3>Made With <span>&#10084;</span> By ahmad adnan</h3>
            </div>
        </footer>
        <!-- end footer -->

        <!-- JS -->
        <script src="/app/resources/js/main.js"></script>
        <script src="/app/resources/js/Recomended psy.js"></script>

</body>


</html>