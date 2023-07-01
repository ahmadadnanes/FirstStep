<?php
include "php/conn.php";
session_start();
$id = "";
$id = implode($_SESSION["id"]);
$sql = "SELECT username from users where id = '$id'";
$result = mysqli_query($conn, $sql);
$us = mysqli_fetch_assoc($result);
$user = $us["username"];
$html = "YourDiares.php?id=$id";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css file -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/Home.css">
    <!-- other css files -->
    <link rel="stylesheet" href="css/normal.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/brands.min.css">
    <title>First Step</title>
</head>

<body bgcolor="#DCDCDC">
    <!-- start header -->
    <nav>
        <div class="container">
            <div class="user">
                <span>
                    <a href="<?php echo $html ?>"><?php echo $user  ?></a>
                </span>
            </div>
            <img src="img/logo-removebg-preview.png" width="90px">

            <div class="normal-bar">
                <a href="#services">Services</a>
                <?php
                if (is_numeric($id)) {
                ?>
                    <a href="php/logout.php">Logout</a>
                <?php
                } else {
                ?>
                    <a href="login.html">Login</a>
                <?php
                }
                ?>
                <a href="#contact">Contact</a>
            </div>

            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="img/bars-solid.svg" id="nav_button">
                    </span>

                    <ul id="nav_ul">
                        <li>
                            <a href="#services">Services</a>
                        </li>

                        <li>
                            <?php
                            if (is_numeric($id)) {
                            ?>
                                <a href="php/logout.php">Logout</a>
                            <?php
                            } else {
                            ?>
                                <a href="login.html">Login</a>
                            <?php
                            } ?>
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


    <!-- start scrollup button -->
    <button class="up" id="up"><i class="fa-solid fa-arrow-up"></i></button>
    <!-- end scrollup button -->

    <!-- start landing -->
    <section>
        <div class="container">
            <div class="intro">
                <h1>
                    First Step
                </h1>
                <p>
                    You Deserve To Be Happy
                </p>
            </div>
        </div>
    </section>
    <!-- end landing -->


    <!-- start about -->
    <article>
        <div class="container">
            <div class="About">
                <h1>
                    About First Step
                </h1>
                <p>
                    There are many common diseases that are marginalized, many
                    people suffer from them without awareness of their affliction or
                    feel embarrassed to recognize them or consult a psychiatrist so
                    the system First Step . presents some diseases and their
                    symptoms in the
                    form of a set of questions by answering these questions the system classifies them if your answer to
                    These
                    questions indicate the presence of a disease or the possibility of its existence. The system will
                    transfer you
                    to a group of the most famous Psychologist through the country in which you live and leave you with the
                    option to
                    visit the doctor.
                </p>
            </div>
        </div>
    </article>
    <!-- end about -->


    <!-- start services -->
    <div class="services" id="services">
        <div class="container">
            <div class="check">
                <h1>Check our services:</h1>
            </div>
            <div class="card-container">
                <div class="card">
                    <img src="img/depression-test.jpg" alt="..." width="200px">
                    <div class="card-body">
                        <h5>Depression Test</h5>
                        <p>
                            if you are feeling overwhelming sadness it's free, quick , confidential. and scirnfically validated.
                        </p>
                        <div class="button-container">
                            <button onclick="location.href='#'">Start</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/Diary_img.jpg" alt="..." width="200px">
                    <div class="card-body">
                        <h5>Diary</h5>
                        <p>here you can express your feelings</p>
                        <div class="button-container">
                            <button onclick="location.href='diary.php?id=<?php $id ?>'">Start</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/therapy 1.jpg" alt="..." width="200px">
                    <div class="card-body">
                        <h5>Recommended Psychologist</h5>
                        <p> here you can explore most famous Psychologist through the country</p>
                        <div class="button-container">
                            <button onclick="location.href='#'">Start</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- end services -->

    <!-- start contact -->
    <section>
        <div class="container">
            <div class="contact">
                <h1>Contact Us</h1>
            </div>
            <div class="contact_form">
                <form action="php" method="post">
                    <input type="email" name="email" id="email" placeholder="Enter your Email"><br><br>
                    <textarea name="contact" id="contact" cols="30" rows="10"></textarea><br><br>
                    <button type="submit">submit</button>

                </form>
            </div>
        </div>
    </section>
    <!-- end contact -->

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

</html>