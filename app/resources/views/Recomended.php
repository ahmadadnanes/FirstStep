<?php
@session_start();
$user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('./app/resources/components/layout.php') ?>
    <title>Recommended Psychologist</title>
</head>

<body class="rec">
    <?php include("./app/resources/components/header.php") ?>

    <!-- start Recomended psy -->
    <section>
        <div class="container">
            <form action="<?= htmlspecialchars('/psy/') ?>" method="get" id="form">
                <div class="form_container">
                    <label for="gov">Choose a governorate:</label><br><br>
                    <select name="gov" id="gov">
                        <?php
                        if (isset($_GET["gov"])) { ?>
                            <option value="<?= $_GET["gov"] ?>" selected disabled><?= $_GET["gov"] ?></option>
                        <?php } ?>
                        <option value="Amman">Amman</option>
                        <option value="Zarqa">Zarqa</option>
                        <option value="Irbid">Irbid</option>
                    </select><br><br>
                    <button type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
    <div class="map">
        <div class="container">
            <h1 style="text-align: center;">Your Map</h1>
            <div style="max-width:100%;overflow:hidden;color:red;width:1200px;height:500px;">
                <div id="embed-map-display" style="height:100%; width:100%;max-width:100%;">
                    <?php include("./app/resources/components/map.php") ?>
                </div><a class="googlecoder" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="make-map-infor-mation">premium bootstrap themes</a>
            </div>
        </div>
    </div>
    <p class="text-center"><a href="https://www.freepik.com/free-photo/blur-hospital_1135191.htm#page=2&query=doctor&position=1&from_view=search&track=sph">Image by mrsiraphol</a> on Freepik</p>
    <!-- end Recomended psy -->

    <?php include("./app/resources/components/footer.html") ?>

    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/app/resources/js/navbar.js"></script>

</body>


</html>