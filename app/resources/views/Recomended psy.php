<?php
include 'app/includes/spl.php';
session_start();
$id = "";
if (isset($_SESSION["id"])) {
    $id = implode($_SESSION["id"]);
    $a = new User();
    $user = $a->getUser($id);
    $html = "Home.php?id=$id";
    $html2 = "YourDiares.php?id=$id";
} else {
    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header("location:login.php?pre=$actual_link");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css file -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/Recomended psy.css">
    <!-- other css files -->
    <link rel="stylesheet" href="css/normal.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/brands.min.css">
    <title>Recommended Psychologist</title>
</head>

<body bgcolor="#DCDCDC">

    <!-- start header -->
    <nav>
        <div class="container">
            <div class="user">
                <a href="<?php echo $html2 ?>"><?php echo $user ?></a>
            </div>
            <a href="<?php echo $html ?>"><img src="img/logo-removebg-preview.png" width="90px"></a>

            <div class="normal-bar">
                <a href="app/logout.php">Logout</a>
            </div>

            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="img/bars-solid.svg" id="nav_button">
                    </span>

                    <ul id="nav_ul">
                        <li>
                            <a href="app/logout.php">Logout</a>
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
            <form action="?" method="get">
                <div class="form_container">
                    <label for="gov">Choose a governorate:</label><br><br>

                    <select name="gov" id="gov">
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
            <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1329&amp;height=1307&amp;hl=en&amp;q=اطباء نفسيين عمان&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://connectionsgame.org/">Connections Puzzle</a></div>
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
    <script src="js/main.js"></script>
    <script src="js/Recomended psy.js"></script>

</body>


</html>