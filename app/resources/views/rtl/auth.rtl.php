<?php
@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/views/components/layout.html") ?>
    <?php if ($server == "login") { ?>
        <title>تسجيل الدخول</title>
    <?php } else { ?>
        <title>تسجيل حساب جديد</title>
    <?php } ?>
</head>

<body class="login">
    <!-- start header -->
    <nav>
        <div class="container">
            <?php include('./app/resources/views/components/logo.html') ?>
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
                    <?php if ($server == "login") { ?>
                        <span>لا يوجد لديك حساب<a href='/signup/?lang=ar'>
                                تسجيل حساب جديد
                            </a><br>
                        <?php } else { ?>
                            <span>لديك حساب؟<a href='/login/?lang=ar'>
                                    تسجيل الدخول
                                </a><br>
                            <?php } ?>
                </div>
                <div class="half2">
                    <center>
                        <form action="<?php
                                        if (isset($_SERVER["QUERY_STRING"])) echo '/' . $server . '/?' . $_SERVER['QUERY_STRING'];
                                        else {
                                            echo '/' . $server;
                                        } ?>" method="post" id="form1">

                            <?php if ($server == "login") { ?><h1>تسجيل الدخول</h1> <?php } else { ?>
                                <h1>تسجيل حساب جديد</h1>
                            <?php } ?>
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
                            <?php if ($server == "login") { ?>
                                <div class="remember">
                                    <label for="remember">تذكرني</label>
                                    <input type="checkbox" name="remember" id="" value="yes">
                                </div>
                            <?php } ?>
                            <button class="btnn" type="submit" name="submit">تسجيل</button>
                        </form>
                        <?php include("./app/resources/views/components/error.php") ?>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_SESSION["success"])) {
    ?>
        <div class="success rounded-2 position-fixed bottom-0 p-1 m-1" id="success">
            <?php echo $_SESSION["success"];
            session_unset();
            ?>
        </div>
    <?php
    }
    ?>
    <!-- end login -->
    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/app/resources/js/components/showButton.js"></script>
    <script src="/app/resources/js/login.js"></script>
</body>
<script src="/app.js"></script>

</html>