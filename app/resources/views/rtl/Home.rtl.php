<?php
include "./app/controller/UserController.php";
@session_start();
$nav = [
    'الخدمات' => [
        '#services',
        'go to services'
    ],
    'تواصل معنا' => [
        '#contact',
        'go to contact'
    ],
];

if(isset($_SESSION["id"])){
    $user = UserController::getUser($_SESSION["id"]);
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
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./app/resources/views/components/layout.html") ?>
    <title>الخطوة الأولى</title>
</head>

<body class="home">
    <!-- start header -->
    <?php include './app/resources/views/components/header.php' ?>
    <!-- end header -->


    <?php include("./app/resources/views/components/up.html") ?>

    <!-- start landing -->
    <section>
        <div class="intro_container">
            <div class="intro">
                <h1>
                    الخطوة الأولى
                </h1>
                <p>
                    انت تستحق انت تكون سعيدا
                </p>
            </div>
        </div>
    </section>
    <!-- end landing -->


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


    <!-- start services -->
    <div class="services" id="services">
        <div class="container">
            <div class="check">
                <h1>تفقد خدماتنا:</h1>
            </div>
            <div class="card-container">
                <div class="card serv">
                    <img src="/app/resources/img/depression-test-min.jpg" alt="..." width="200px" loading="lazy">
                    <div class="card-body">
                        <h5>اختبار الإكتئاب</h5>
                        <p>
                            إذا كنت تشعر بالحزن الشديد، فهو مجاني وسريع وسري. ومثبتة علميا.
                        </p>
                        <div class="button-container">
                            <button onclick="location.href='/depression/?lang=ar'">أبدأ</button>
                        </div>
                    </div>
                </div>
                <div class="card serv">
                    <img src="/app/resources/img/Diary_img-min.jpg" alt="..." width="200px" class="diary" height="235px" loading="lazy">
                    <div class="card-body">
                        <h5>المذكرة</h5>
                        <p>هنا يمكنك التعبير عن مشاعرك وآرائك ومناقشتها مع أشخاص آخرين حول العالم</p>
                        <div class="button-container">
                            <button onclick="location.href='/diary/?lang=ar'">أبدأ</button>
                        </div>
                    </div>
                </div>
                <div class="card serv">
                    <img src="/app/resources/img/therapy-min.jpg" alt="..." width="200px" loading="lazy">
                    <div class="card-body">
                        <h5>الأطباء النفسيين الموصى بهم</h5>
                        <p>هنا يمكنك استكشاف أشهر علماء النفس في البلاد</p>
                        <div class="button-container">
                            <button onclick="location.href='/psy/lang=ar'">أبدأ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end services -->

    <!-- start contact -->
    <section>
        <div class="container">
            <div class="contact">
                <h1>تواصل معنا</h1>
            </div>
            <div class="contact_form serv">
                <form action="/contact" method="post">
                    <input type="email" name="email" id="email" placeholder=" ادخل البريد الألكتروني" style="padding-right: 60px;" required><br><br>
                    <textarea name="contact" id="contact" cols="30" rows="10" required></textarea><br><br>
                    <button type="submit" name="submit">ادخال</button>
                </form>
            </div>
            <p class="text-center mt-2">
                Image by <a href="https://www.freepik.com/free-photo/notepad-pencils-left_2436952.htm#query=pen%20background&position=11&from_view=keyword&track=ais" aria-label="got to freepik">Freepik</a>
            </p>
        </div>
    </section>
    <!-- end contact -->
    <?php include("./app/resources/views/components/rtl/footer.rtl.html") ?>
   
</body>
 <!-- JS -->
<script src="/app.js"></script>
<script src="/app/resources/js/navbar.js"></script>
<script src="/app/resources/js/up.js"></script>
<script src="/app/resources/js/Home.js"></script>
</html>