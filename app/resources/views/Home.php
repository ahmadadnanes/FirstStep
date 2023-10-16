<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="/app/resources/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/app/resources/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/app/resources/img/favicon-16x16.png">
    <link rel="manifest" href="/app/resources/img/site.webmanifest">
    <link rel="mask-icon" href="/app/resources/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="theme-color" content="#ffffff">
    <!-- main css file -->
    <link rel="stylesheet" href="/app/resources/css/main.css">
    <link rel="stylesheet" href="/app/resources/css/Home.css">
    <!-- other css files -->
    <link rel="stylesheet" href="/app/resources/css/normal.css">
    <link rel="stylesheet" href="/app/resources/css/all.min.css">
    <link rel="stylesheet" href="/app/resources/css/brands.min.css">
    <title>First Step</title>
</head>

<body>
    <!-- start header -->
    <nav>
        <div class="container">
            <?php
            if (isset($_SESSION["user"])) {
                $user = $_SESSION["user"];
            ?>
                <div class="user">
                    <span>
                        <a href="<?= '/user/' . $user  ?>"><?php echo $user  ?></a>
                    </span>
                </div>
            <?php } ?>
            <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px"></a>

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
                <?php
                }
                ?>
                <a href="#contact">Contact</a>
            </div>

            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="/app/resources/img/bars-solid.svg" id="nav_button">
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
                    <input type="email" name="email" id="email" placeholder="Enter your Email" style="padding-right: 60px;" required><br><br>
                    <textarea name="contact" id="contact" cols="30" rows="10" required></textarea><br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
    <!-- end contact -->
    <?php include("./app/resources/components/footer.php") ?>
    <!-- JS -->
    <script src="/app/resources/js/main.js"></script>
    <script src="/app/resources/js/Home.js"></script>
</body>

</html>