<?php
include 'php/includes/spl.php';
session_start();
$id = "";
if (isset($_SESSION["id"])) {
    $id = implode($_SESSION["id"]);
    $a = new User();
    $user = $a->getUser($id);
    $html = "index.php?id=$id";
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
    <!-- main css files -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/diary.css">
    <!-- other css files -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/brands.min.css">
    <link rel="stylesheet" href="css/normal.css">
    <title>Diary</title>
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
                <a href="php/logout.php">Logout</a>
            </div>

            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="img/bars-solid.svg" id="nav_button">
                    </span>

                    <ul id="nav_ul">

                        <li>
                            <a href="php/logout.php">Logout</a>
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

    <!-- start diary -->
    <section>
        <div class="container">
            <form action="php/save_diary.php" method="post">
                <div class="title">
                    <input type="text" name="title" id="title" required placeholder="Enter the title" style="padding-right: 60px;">
                </div>
                <div class="content">
                    <textarea name="content" id="content" cols="30" rows="10" required>
                    </textarea>
                </div>
                <div class="button">
                    <button>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- end diary -->

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
</body>
</html>