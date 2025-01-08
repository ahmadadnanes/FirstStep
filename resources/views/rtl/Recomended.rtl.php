<?php
@session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
$nav = []
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('resources/views/components/layout.php') ?>
    <title>الأطباء النفسيين الموصى بهم</title>
</head>

<body class="rec">
    <?php include("resources/views/components/header.php") ?>

    <!-- start Recommended psy -->
    <section>
        <div class="container">
            <form action="<?= htmlspecialchars('/psy/') ?>" method="get" id="form">
                <div class="form_container">
                    <label for="gov" class="text-center">اختر محافظتك</label><br><br>
                    <select name="gov" id="gov">
                        <?php
                        if (isset($_GET["gov"])) {
                            $gov = $_GET["gov"];
                        ?>
                            <option value="<?= $_GET["gov"] ?>" selected disabled><?= $_GET["gov"] ?></option>
                        <?php } ?>
                        <option value="Amman">عمان</option>
                        <option value="Zarqa">الزرقاء</option>
                        <option value="Irbid">اربد</option>
                    </select><br><br>
                    <button type="submit" class="text-center">
                        أدخال
                    </button>
                </div>
            </form>
        </div>
    </section>
    <div class="map">
        <div class="container">
            <h1 style="text-align: center;">خريطتك</h1>
            <div style="max-width:100%;overflow:hidden;color:red;width:1200px;height:500px;">
                <div id="embed-map-display" style="height:100%; width:100%;max-width:100%;">
                    <?php include("resources/views/components/map.php") ?>
                </div><a class="googlecoder" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="make-map-infor-mation">premium bootstrap themes</a>
            </div>
        </div>
    </div>
    <p class="text-center"><a href="https://www.freepik.com/free-photo/blur-hospital_1135191.htm#page=2&query=doctor&position=1&from_view=search&track=sph">Image by mrsiraphol</a> on Freepik</p>
    <!-- end Recommended psy -->

    <?php include("resources/views/components/rtl/footer.rtl.html") ?>

    <!-- JS -->
    <script src="/app.js"></script>
    <script src="/resources/js/navbar.js"></script>

</body>

</html>