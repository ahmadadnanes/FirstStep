<!DOCTYPE html>
<?php 
use app\controller\UserController;
include "./app/include/autoloader.php";
$nav = [];
@session_start();

if(isset($_SESSION["id"])){
    $user = UserController::get_user($_SESSION["id"]);
    $nav['تسجيل الخروج'] = [
        '/logout',
        'logout'
    ];
} else {
    $nav['تسجيل الدخول'] = [
        '/login/?lang=ar',
        'login'
    ];
    $nav['إنشاء حساب جديد'] = [
        '/signup/?lang=ar',
        'signup'
    ];
}

$nav['English'] = [
    '/',
    'toEng'
]
?>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./resources/views/components/layout.php" ?>
    <title>Who We Are</title>
</head>
<body class="about">
    <?php include "./resources/views/components/header.php" ?>
    <!-- start about -->
    <article>
        <div class="container">
            <div class="About">
                <h1>
                    عن الخطوة الأولى
                </h1>
                <p>
                    هناك العديد من الأمراض الشائعة التي يتم تهميشها، يعاني منها الكثير من الأشخاص دون وعي بمرضهم أو يشعرون بالحرج من التعرف عليها أو استشارة الطبيب النفسي لذلك النظام الخطوة الأولى. يعرض بعض الأمراض وأعراضها على شكل مجموعة من الأسئلة من خلال الإجابة على هذه الأسئلة يقوم النظام بتصنيفها إذا كانت إجابتك على هذه الأسئلة تشير إلى وجود مرض ما أو إمكانية وجوده. سيقوم النظام بتحويلك إلى مجموعة من أشهر الأطباء النفسيين عبر البلد الذي تعيش فيه ويترك لك خيار زيارة الطبيب.
                </p>
            </div>
        </div>
    </article>
    <!-- end about -->
    <?php include "./resources/views/components/rtl/footer.rtl.html" ?>
</body>
<script src="/resources/js/navbar.js"></script>
</html>