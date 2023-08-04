<?php
require "php/conn.php";
session_start();
$id = "";
if (isset($_SESSION["id"])) {
    $id = implode($_SESSION["id"]);
    $sql = "SELECT diary_title,diary_content FROM diary WHERe user_id = $id ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $html = "diary.php?id=$id";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css files -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/YourDiares.css">
    <!-- other css files -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/brands.min.css">
    <link rel="stylesheet" href="css/normal.css">
    <title>Your Diares</title>
</head>

<body bgcolor="#DCDCDC">
    <!-- start header -->
    <nav>
        <div class="container">
            <a href="<?php echo "Home.php?id=$id" ?>"><img src="img/logo-removebg-preview.png" width="90px"></a>

            <div class="normal-bar">
                <a href="php/logout.php">Logout</a>
                <a href="<?php echo $html ?>">Diary</a>
            </div>

            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="img/bars-solid.svg" id="nav_button">
                    </span>

                    <ul id="nav_ul">

                        <li>
                            <a href="php/logout.php">Logout</a>
                            <a href="<?php echo $html ?>">Diary</a>
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
            <?php while ($row = mysqli_fetch_assoc($result)) {
                $dt = $row["diary_title"];
                $dc = $row["diary_content"]; ?>
                <div class="diary_container">
                    <div class="title">
                        <p><?php echo $dt ?></p>
                    </div>
                    <div class="content">
                        <p><?php echo $dc ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- end your diares -->

    <!-- start footer -->
    <footer>
        <div class="footer_container" style="background-color: brown;">
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

    <?php
    mysqli_close($conn);
    ?>
</body>

</html>