<?php
@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("resources/views/components/layout.php") ?>
    <?= $server === "login" ? "Login" : "Sign Up" ?>
</head>

<body class="login">
    <!-- start header -->
    <nav>
        <div class="container">
            <?php include('resources/views/components/logo.html') ?>
            <div class="normal-bar d-block">
                <?php if ($server == "signup") { ?> <a href="/login/?lang=ar">تسجيل الدخول</a> <?php } else { ?>
                    <a href="/signup/?lang=ar">تسجيل حساب جديد</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- end header -->

    <!-- start login -->
    <section>
        <div class="container">
            <div class="square">
                <div class="half1">
                    <h2 class="quote">
                        كن شخصًا يجعل الجميع يشعرون
                        وكأنهم شخص ما
                    </h2>
                    <?php 
                        if ($server == "login") {
                            echo
                                '<span>لا يوجد لديك حساب
                                <a href="/signup/ar">
                                    تسجيل حساب جديد
                                </a>
                                </span>';
                        } else {
                            echo 
                                '<span>لديك حساب؟<a href="/login/ar">
                                        تسجيل الدخول
                                    </a>
                                </span>';
                        };
                    ?>
                </div>
                <div class="half2">
                    <center>
                        <form action="
                            <?=
                                isset($_SERVER["QUERY_STRING"]) ? '/' . $server . '/?' . $_SERVER['QUERY_STRING']
                                : '/' . $server?>" method="post" id="form1">
                            
                            <?= $server == "login" ? '<h1>تسجيل الدخول</h1>' : '<h1>تسجيل حساب جديد</h1>' ?>
                            <div class="input-container">
                                <?php if ($server == "signup") { ?>
                                    <label for="username"></label>
                                    <input type="text" id="username" name="username" required placeholder="اسم المستخدم"><br>

                                <?php } ?>
                                <label for="email"></label>
                                <input type="email" id="email" name="email" required placeholder="البريد الإلكتروني"><br>

                                <div class="password">
                                    <label for="password"></label>
                                    <input type="password" id="password" name="password" required placeholder="كلمة سر" min="5">
                                    <i class="fa-solid fa-eye show" id="show"></i>
                                </div>
                            </div>
                            <?php if ($server == "login") : ?>
                                <div class="remember">
                                    <label for="remember">تذكرني</label>
                                    <input type="checkbox" name="remember" id="" value="yes">
                                </div>
                            <?php endif ?>
                            <button class="btnn" type="submit" name="submit">تسجيل</button>
                        </form>
                        <?php include("resources/views/components/error.php") ?>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_SESSION["status"])) :
    ?>
        <div class="success rounded-2 position-fixed bottom-0 p-1 m-1" id="success">
            <?php echo $_SESSION["status"];
            session_unset();
            ?>
        </div>
    <?php
    endif;
    ?>
    <!-- end login -->
    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/resources/js/components/showButton.js"></script>
    <script src="/resources/js/login.js"></script>
</body>
<script src="/app.js"></script>

</html>