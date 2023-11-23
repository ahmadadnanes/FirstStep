<?php
$server = explode('/', $_SERVER["REQUEST_URI"])[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.php") ?>
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
            <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px" alt="..."></a>
            <div class="normal-bar">
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
                </div>
                <div class="half2">
                    <center>
                        <form action="<?php
                                        if (isset($_SERVER["QUERY_STRING"])) echo '/' . $server . '/?' . $_SERVER['QUERY_STRING'];
                                        else {
                                            echo '/' . $server;
                                        } ?>" method="post" id="form1">

                            <?php if ($server == "login") { ?><h1>Login</h1> <?php } else { ?>
                                <h1>SignUp</h1>
                            <?php } ?>
                            <div class="input-container">
                                <?php if ($server == "signup") { ?>
                                    <label for="username"></label>
                                    <input type="text" id="username" name="username" required placeholder="Username">

                                <?php } ?>
                                <label for="email"></label>
                                <input type="email" id="email" name="email" required placeholder="Email">

                                <div class="password">
                                    <label for="password"></label>
                                    <input type="password" id="password" name="password" required placeholder="Password" min="5">
                                    <i class="fa-solid fa-eye show" id="show"></i>
                                </div>
                            </div>
                            <?php if ($server == "login") { ?>
                                <div class="remember">
                                    <label for="remember">Remember Me</label>
                                    <input type="checkbox" name="remember" id="" value="yes">
                                </div>
                                <span>Doesn't have an account <a href=<?= '/signup' ?>>
                                        Signup
                                    </a>
                                </span><br>
                            <?php } else { ?>
                                <span>have an account <a href=<?= '/login' ?>>
                                        Login
                                    </a><br>
                                <?php } ?>
                                <button class="btnn" type="submit" name="submit"><?php if ($server == "login") { ?> Login <?php } else { ?> SignUp <?php } ?></button>
                        </form>
                        <?php include("./app/resources/components/error.php") ?>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_SESSION["success"])) {
    ?>
        <div class="success rounded-2 position-fixed bottom-0 p-1 m-1 text-white" id="success">
            <?php echo $_SESSION["success"];
            session_unset();
            ?>
        </div>
    <?php
    }
    ?>
    <!-- end login -->
    <!-- JS -->
    <script src="/app/resources/js/app.js"></script>
    <script src="app/resources/js/main.js"></script>
    <script src="/app/resources/js/login.js"></script>
</body>

</html>