<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.php") ?>
    <title>SignUp</title>
</head>

<body class="login">
    <!-- start header -->
    <nav>
        <div class="container">
            <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px" alt="logo"></a>

            <div class="normal-bar">
                <a href="/login">Login</a>
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
                        <form action="/signup" method="post" id="form1">
                            <h1>SignUp</h1>
                            <div style="margin-bottom:20px;">
                                <label for="username"></label>
                                <input type="text" id="username" name="username" required placeholder="Username">
                                <br><br>

                                <label for="email"></label>
                                <input type="email" id="email" name="email" required placeholder="Email">
                                <br>

                                <label for="password"></label>
                                <div class="password">
                                    <input type="password" id="password" name="password" required placeholder="Password" min="5">
                                    <i class="fa-solid fa-eye show" id="show"></i>
                                </div>
                                <br>
                            </div>

                            <span>if you have an account <a href="/login">Login</a></span><br>

                            <button class="btnn" type="submit" name="submit">SignUp</button>
                        </form>
                        <?php include("./app/resources/components/error.php") ?>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <!-- end login -->
    <!-- JS -->
    <script src="/app/resources/js/main.js"></script>
    <script src="/app/resources/js/login.js"></script>
</body>

</html>