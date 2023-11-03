<?php
if (!isset($_SESSION["user"])) {
    session_start();
}
$user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/components/layout.php") ?>
    <title>Diary</title>
</head>

<body class="diary">
    <?php include("./app/resources/components/header.php") ?>
    <?php include("./app/resources/components/up.html") ?>

    <!-- start diary -->
    <section>
        <div class="container">
            <form action="/diary" method="post">
                <div class="title">
                    <input type="text" name="title" id="title" required placeholder="Enter the title" style="padding-right: 60px;">
                </div>
                <div class="content">
                    <textarea name="content" id="content" cols="30" rows="10" required>
                    </textarea>
                </div>
                <div class="button">
                    <button type="submit" name="submit">
                        Submit
                    </button>
                    <?php include("./app/resources/components/error.php") ?>
                </div>
            </form>

        </div>
    </section>
    <!-- end diary -->
    <?php include("./app/resources/components/footer.html") ?>
    <!-- JS -->
    <script src="/app/resources/js/main.js"></script>
</body>

</html>