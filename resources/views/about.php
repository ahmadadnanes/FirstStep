<!DOCTYPE html>
<?php 
use app\controller\UserController;
require "vendor/autoload.php";
$nav = [];
@session_start();

if(isset($_SESSION["id"])){
    if(UserController::verify_admin($_SESSION["id"])){
        $nav["Admin"] = ["/admin" , "go to admin page"];
    }
    $nav["Logout"] = ["/logout" , "logout"];
    $user = UserController::get_user($_SESSION["id"]);

}else{
    $nav["Login"] = ["/login" , "login"];
    $nav["SignUp"] = ["/signup" , "signup"];
}

$nav['العربية'] = ["/about/en", "toAR"];
?>
<html dir="ltr" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./resources/views/components/layout.php" ?>
    <title>Who We Are</title>
</head>
<body class="about">
    <?php include "./resources/views/components/header.php" ?>
    <article>
        <div class="container">
            <div class="About">
                <h1>
                    About First Step
                </h1>
                <p>
                    There are many common diseases that are marginalized, many
                    people suffer from them without awareness of their affliction or
                    feel embarrassed to recognize them or consult a psychiatrist so
                    the system First Step . presents some diseases and their
                    symptoms in the
                    form of a set of questions by answering these questions the system classifies them if your answer to
                    These
                    questions indicate the presence of a disease or the possibility of its existence. The system will
                    transfer you
                    to a group of the most famous Psychologist through the country in which you live and leave you with the
                    option to
                    visit the doctor.
                </p>
            </div>
        </div>
    </article>
    <?php include "./resources/views/components/footer.html" ?>
</body>
<script src="/resources/js/navbar.js"></script>
</html>