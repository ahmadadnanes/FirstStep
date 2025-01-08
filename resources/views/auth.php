<?php
@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];
use app\include\csrf;
require 'vendor/autoload.php';
if($server == 'login'){
    $slots = [
        'title' => 'Login',
        'url' => '/login',
        'status' => [
            'title' => 'Signup',
            'text' => "Doesn't have an account",
            'url' => '/signup'
        ]
    ];
}else{
    $slots = [
        'title' => 'Signup',
        'url' => '/signup',
        'status' => [
            'title' => 'Login',
            'text' => "have an account?",
            'url' => '/login'
        ]
    ];
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("resources/views/components/layout.php") ?>
    <title><?= $slots['title'] ?></title>
</head>

<body class="login">
    <!-- start header -->
    <nav>
        <div class="container">
            <?php include('resources/views/components/logo.php') ?>
            <div class="normal-bar d-block">
                <a href="<?= $slots["status"]["url"] ?>"><?= $slots["status"]["title"]?></a>
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
                        Be somebody who makes everybody feel like a somebody.
                    </h2>
                    <span>
                        <?= $slots["status"]["text"] ?>
                        <a href="<?= $slots["status"]["url"] ?>">
                            <?= $slots["status"]["title"] ?>
                        </a>
                    </span>
                </div>
                <div class="half2">
                    <center>
                        <form action="<?=
                                        isset($_SERVER["QUERY_STRING"]) ? '/' . $server . '/?' . $_SERVER['QUERY_STRING']  : '/' . $server;
                                        ?>" method="post" id="form1">

                            <h1><?= $slots["title"]  ?></h1>
                            <div class="input-container">
                                <?php csrf::create_token() ?> 
                                <?php if ($server == "signup") : ?>
                                    <label for="username"></label>
                                    <input type="text" id="username" name="username" required placeholder="Username"><br>
                                <?php endif ?>
                                <label for="email"></label>
                                <input type="email" id="email" name="email" required placeholder="Email"><br>

                                <div class="password">
                                    <label for="password"></label>
                                    <input type="password" class="passwordInput" name="password" required placeholder="Password" min="5">
                                    <i class="fa-solid fa-eye show change"></i>
                                </div>
                                <?php if($server == "signup") : ?>
                                    <div class="password">
                                    <label for="confirm_password"></label>
                                    <input type="password" class="passwordInput" name="confirm_password" required placeholder="Confirm Password" min="5">
                                    <i class="fa-solid fa-eye show change"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if ($server == "login") : ?>
                                <div class="remember">
                                    <label for="remember">Remember Me</label>
                                    <input type="checkbox" name="remember" id="" value="yes">
                                </div>
                                <div class="forget">
                                    <span>Forget Password? </span><a href="/forgetPassword">Click Here</a>
                                </div>
                            <?php endif ?>
                            <button class="btnn" type="submit" name="submit"><?php if ($server == "login") { ?> Login <?php } else { ?> SignUp <?php } ?></button>
                        </form>
                        <?php include("resources/views/components/error.php") ?>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_SESSION["status"])) {
    ?>
        <div class="success rounded-2 position-fixed bottom-0 p-1 m-1" id="success">
            <?php echo $_SESSION["status"];
            session_unset();
            ?>
        </div>
    <?php
    }
    ?>
    <!-- end login -->
    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/resources/js/components/showButton.js"></script>
    <script src="/resources/js/login.js"></script>
</body>
<script src="/app.js"></script>

</html>