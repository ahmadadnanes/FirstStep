<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.php") ?>
    <title>Login</title>
</head>

<body class="login">
    <!-- start header -->
    <nav>
        <div class="container">
            <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px" alt="..."></a>
            <div class="normal-bar">
                <a href="/signup">SignUp</a>
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
                                        if (isset($_SERVER["QUERY_STRING"])) echo "/login/?" . $_SERVER['QUERY_STRING'];
                                        else {
                                            echo "/login";
                                        } ?>" method="post" id="form1">

                            <h1>Login</h1>
                            <div style="margin-bottom:20px;">
                                <label for="email"></label>
                                <input type="email" id="email" name="email" required placeholder="Email">
                                <br>
                                <label for="password"></label>
                                <div class="password">
                                    <input type="password" id="password" name="password" required placeholder="Password" min="5">
                                    <i class="fa-solid fa-eye show" id="show"></i>
                                </div>
                                <br><br>
                            </div>

                            <span>Doesn't have an account <a href="/signup">Signup</a></span><br>

                            <button class="btnn" type="submit" name="submit">Login</button>
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
    <script src="/app/resources/js/login.js"></script>
    <script src="app/resources/js/main.js"></script>
</body>

</html>