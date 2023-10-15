<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css file -->
    <link rel="stylesheet" href="/app/resources/css/main.css">
    <link rel="stylesheet" href="/app/resources/css/login.css">
    <!-- other css files -->
    <link rel="stylesheet" href="/app/resources/css/all.min.css">
    <link rel="stylesheet" href="/app/resources/css/brands.min.css">
    <link rel="stylesheet" href="/app/resources/css/normal.css">
    <title>Login</title>
</head>

<body bgcolor="#DCDCDC">
    <!-- start header -->
    <nav>
        <div class="container">
            <a href="/"><img src="/app/resources/img/logo-removebg-preview.png" width="90px"></a>

            <div class="normal-bar">
                <a href="/signup">SignUp</a>
            </div>

            <div class="drop-down">
                <div class="links">
                    <span class="icon">
                        <input type="image" src="/app/resources/img/bars-solid.svg" id="nav_button">
                    </span>

                    <ul id="nav_ul">

                        <li>
                            <a href="/signup">SignUp</a>
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

    <!-- start login -->
    <section>
        <div class="container">
            <div class="square">
                <div class="half1">
                    <h2 style="text-align: center;color:#4a916e;">
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

                            <div style="margin-bottom:20px;">
                                <label for="email"></label>
                                <input type="email" id="email" name="email" required placeholder="Email">
                                <br><br>

                                <label for="password"></label>
                                <input type="password" id="password" name="password" required placeholder="Password">
                                <br><br>
                            </div>

                            <span>Doesn't have an account <a href="/signup">Signup</a></span><br>

                            <button class="btnn" type="submit">Login</button>
                        </form>
                        <?php
                        if (isset($_GET["msg"])) { ?>
                            <div class="error">
                                <h3><?php echo "email or password is wrong please try again" ?></h3>
                            </div>
                        <?php
                        }
                        ?>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <!-- end login -->

    <!-- start footer -->
    <footer>
        <div class="footer_container">
            <h2>Follow Me</h2>
            <ul class="footer_ul">
                <li><a href="https://www.linkedin.com/in/ahmad-istaitieh-64a635248/"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100002178974914"><i class=" fa-brands fa-facebook"></i></a></li>
                <li><a href="https://github.com/ahmadadnanes"><i class="fa-brands fa-github"></i></a></li>
            </ul>
            <h3>Made With <span>&#10084;</span> By ahmad adnan</h3>
        </div>
    </footer>
    <!-- end footer -->

    <!-- JS -->
    <script src="app/resources/js/main.js"></script>
</body>

</html>