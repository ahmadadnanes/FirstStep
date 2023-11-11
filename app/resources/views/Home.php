<?php
if (empty($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.php") ?>
    <title>First Step</title>
</head>

<body class="home">
    <!-- start header -->
    <nav>
        <div class="container">
            <a href="/" class="logo"><img src="/app/resources/img/logo-removebg-preview.png" width="90px" alt="logo"></a>

            <div class="normal-bar">
                <a href="#services">Services</a>
                <?php
                if (isset($_SESSION["id"])) {
                ?>
                    <a href="/logout">Logout</a>
                <?php
                } else {
                ?>
                    <a href="/login">Login</a>
                    <a href="/signup">SignUp</a>
                <?php
                }
                ?>
                <a href="#contact">Contact</a>
            </div>

            <?php
            if (isset($_SESSION["user"])) {
                $user = $_SESSION["user"];
            ?>
                <div class="user">
                    <span class="icon">
                        <span>
                            <a href="<?= '/user/' . $user  ?>"><i class="fa-solid fa-user" id="user"></i></a>
                        </span>
                    </span>
                </div>
            <?php } ?>

            <div class="drop-down" id="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="/app/resources/img/bars-solid.svg" id="nav_button" alt="bars">
                    </span>

                    <ul id="nav_ul">
                        <li>
                            <a href="#services">Services</a>
                        </li>

                        <li>
                            <?php
                            if (isset($_SESSION["id"])) {
                            ?>
                                <a href="/logout">Logout</a>
                            <?php
                            } else {
                            ?>
                                <a href="/login">Login</a>
                                <a href="/signup">SignUp</a>
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


    <?php include("./app/resources/components/up.html") ?>

    <!-- start landing -->
    <section>
        <div class="intro_container">
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
                <div class="card serv">
                    <img src="/app/resources/img/depression-test.jpg" alt="..." width="200px">
                    <div class="card-body">
                        <h5>Depression Test</h5>
                        <p>
                            if you are feeling overwhelming sadness it's free, quick , confidential. and scientifically validated.
                        </p>
                        <div class="button-container">
                            <button onclick="location.href='/depression'">Start</button>
                        </div>
                    </div>
                </div>
                <div class="card serv">
                    <img src="/app/resources/img/Diary_img.jpg" alt="..." width="200px" class="diary" height="235px">
                    <div class="card-body">
                        <h5>Diary</h5>
                        <p>here you can express your feelings</p>
                        <div class="button-container">
                            <button onclick="location.href='/diary'">Start</button>
                        </div>
                    </div>
                </div>
                <div class="card serv">
                    <img src="/app/resources/img/therapy 1.jpg" alt="..." width="200px">
                    <div class="card-body">
                        <h5>Recommended Psychologist</h5>
                        <p> here you can explore most famous Psychologist through the country</p>
                        <div class="button-container">
                            <button onclick="location.href='/psy'">Start</button>
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
                <?php include("./app/resources/components/error.php") ?>
            </div>
            <div class="contact_form serv">
                <form action="/contact" method="post">
                    <input type="email" name="email" id="email" placeholder=" Enter your Email" style="padding-right: 60px;" required><br><br>
                    <textarea name="contact" id="contact" cols="30" rows="10" required></textarea><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <p class="text-center mt-2">
                Image by <a href="https://www.freepik.com/free-photo/notepad-pencils-left_2436952.htm#query=pen%20background&position=11&from_view=keyword&track=ais">Freepik</a>
            </p>
        </div>
    </section>
    <!-- end contact -->
    <?php include("./app/resources/components/footer.html") ?>
    <!-- JS -->
    <script src="/app/resources/js/main.js"></script>
    <script src="/app/resources/js/Home.js"></script>
</body>

</html>