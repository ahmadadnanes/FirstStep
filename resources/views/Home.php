<?php
use app\controller\UserController;
require "vendor/autoload.php";
@session_start();
$nav = [
    'Who We Are' => [
        '/about',
        'go to about'
    ]
];

if(isset($_SESSION["id"])){
    if(UserController::verify_admin($_SESSION["id"])){
        $nav["Admin"] = ["/admin" , "go to admin page"];
    }
    $user = UserController::get_user($_SESSION["id"]);
}else{
    $nav["Login"] = ["/login" , "login"];
    $nav["SignUp"] = ["/signup" , "signup"];
}

$nav['العربية'] = ["/ar", "toAR"];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("resources/views/components/layout.php") ?>
    <title>First Step</title>
</head>

<body class="home">
    <!-- start header -->
        <?php include('resources/views/components/header.php') ?>
    <!-- end header -->


    <?php include("resources/views/components/up.html") ?>

    <!-- start landing -->
    <section>
        <div class="container">
            <div class="intro_container">
                <div class="intro">
                    <h1>
                        First Step
                    </h1>
                    <p>
                        You Deserve To Be Happy
                    </p>
                </div>
                <div class="circle"></div>
            </div>
        </div>
    </section>
    <!-- end landing -->

    <!-- start services -->
    <div class="services" id="services">
        <div class="container">
            <div class="check">
                <h1>Check our services:</h1>
            </div>
            <div class="card-container">
                <div class="card serv">
                    <img src="/resources/img/depression-test-min.jpg" alt="..." width="200px" loading="lazy">
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
                    <img src="/resources/img/Diary_img-min.jpg" alt="..." width="200px" class="diary" height="235px" loading="lazy">
                    <div class="card-body">
                        <h5>Diary</h5>
                        <p>here you can express your feelings and opinions and discuses it with other people</p>
                        <div class="button-container">
                            <button onclick="location.href='/diary'">Start</button>
                        </div>
                    </div>
                </div>
                <div class="card serv">
                    <img src="/resources/img/therapy-min.jpg" alt="..." width="200px" loading="lazy">
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
            </div>
            <div class="contact_form serv">
                <form action="/contact" method="post">
                    <input type="email" name="email" id="email" placeholder=" Enter your Email" style="padding-right: 60px;" required><br><br>
                    <textarea name="contact" id="contact" cols="30" rows="10" required></textarea><br><br>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
            <p class="text-center mt-2">
                Image by <a href="https://www.freepik.com/free-photo/notepad-pencils-left_2436952.htm#query=pen%20background&position=11&from_view=keyword&track=ais" aria-label="got to freepik">Freepik</a>
            </p>
        </div>
    </section>
    <!-- end contact -->
    <?php include("resources/views/components/footer.html") ?>
   
</body>
 <!-- JS -->
<script src="/app.js"></script>
<script src="/resources/js/navbar.js"></script>
<script src="/resources/js/up.js"></script>
<script src="/resources/js/Home.js"></script>
</html>