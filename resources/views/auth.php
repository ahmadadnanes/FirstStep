<?php
@session_start();
$server = explode('/', $_SERVER["REQUEST_URI"])[1];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("resources/views/components/layout.php") ?>
    <?php if ($server == "login") { ?>
        <title>Login</title>
    <?php } else { ?>
        <title>Signup</title>
    <?php } ?>
</head>

<body class="login">
    <!-- start header -->
    <nav>
        <div class="container">
            <?php include('resources/views/components/logo.html') ?>
            <div class="normal-bar d-block">
                <?php if ($server == "signup") { ?> <a href="/login">Login</a> <?php } else { ?>
                    <a href="/signup">SignUp</a>
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
                        Be somebody who makes everybody feel like a somebody.
                    </h2>
                    <?php if ($server == "login") :?>
                        <span>
                            Doesn't have an account
                            <a href='/signup'>
                                Signup
                            </a><br>
                        </span>
                    <?php else : ?>
                            <span>
                                have an account 
                                <a href='/login'>
                                    Login
                                </a><br>
                            </span>
                    <?php endif ?>
                </div>
                <div class="half2">
                    <center>
                        <form action="<?=
                                        isset($_SERVER["QUERY_STRING"]) ? '/' . $server . '/?' . $_SERVER['QUERY_STRING']  : '/' . $server;
                                        ?>" method="post" id="form1">

                            <h1><?= $server == "login" ? 'Login'  :  'SignUp'  ?></h1>
                            <div class="input-container">
                                <?php if ($server == "signup") : ?>
                                    <label for="username"></label>
                                    <input type="text" id="username" name="username" required placeholder="Username"><br>
                                <?php endif ?>
                                <label for="email"></label>
                                <input type="email" id="email" name="email" required placeholder="Email"><br>

                                <div class="password">
                                    <label for="password"></label>
                                    <input type="password" id="password" name="password" required placeholder="Password" min="5">
                                    <i class="fa-solid fa-eye show" id="show"></i>
                                </div>
                            </div>
                            <?php if ($server == "login") : ?>
                                <div class="remember">
                                    <label for="remember">Remember Me</label>
                                    <input type="checkbox" name="remember" id="" value="yes">
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
    <script src="/resources/js/components/showButton.js"></script>
    <script src="/resources/js/login.js"></script>
</body>
<script src="/app.js"></script>

</html>