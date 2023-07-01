<?php
include "php/conn.php";
session_start();
$id = "";
$id = implode($_SESSION["id"]);
$sql = "SELECT username from users where id = '$id'";
$result = mysqli_query($conn, $sql);
$us = mysqli_fetch_assoc($result);
$user = $us["username"];
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
                <span>
                    <?php echo $user  ?>
                </span>
            </div>
            <img src="img/logo-removebg-preview.png" width="90px">

            <div class="normal-bar">
                <a href="php/logout.php">Logout</a>
                <a href="#contact">Contact</a>
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

                        <li>
                            <a href="#contact">Contact</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>


    </nav>
    <!-- end header -->

    <!-- start diary -->
    <section>
        <div class="container">
            <form action="php/save_diary.php" method="post">
                <div class="title">
                    <input type="text" name="title" id="title" required placeholder="Enter the title">
                </div>
                <div class="content">
                    <textarea name="content" id="content" cols="30" rows="10" required placeholder="Enter the content">
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
        <div class="container" style="background-color: brown;">
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
<?php
mysqli_close($conn);
?>

</html>