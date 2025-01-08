<?php
@session_start();
$user = $_SESSION["user"];
$nav = []
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css files -->
    <?php include("resources/views/components/layout.php") ?>
    <title>اختبار الإكتئاب</title>
</head>

<body class="dep">
    <?php include("resources/views/components/header.php") ?>
    <?php include("resources/views/components/up.html") ?>
    <!-- start depression test -->
    <section>

        <div class="container">
            <h1 id="htr">ساعدنا في مطابقة لك مع <span> المعالج الصحيح</span></h1>
            <br><br>

            <div class="container">
                <p class="paragraph">
                    يرجى ملء هذا الاستبيان القصير لتقديم بعض المعلومات الأساسية عنك والمشكلات التي ترغب في التعامل معها في العلاج.سيساعدنا على مطابقة لك مع المعالج الأكثر ملاءمة لك.ستمنح إجاباتك هذا المعالج نقطة انطلاق جيدة في التعرف عليك.
                    استخدم مفتاح TAB للتنقل في هذا الاستبيان واستخدم مفتاح Enter لتأكيد التحديد.بمجرد استخدام مفتاح إدخال Click/Use لتحديد إجابة للسؤال الحالي ، سننتقل إلى السؤال التالي في القائمة.
                </p>
            </div>
        </div>
        <br> <br>

        <div class="container">
            <h1 id="dep">اختبار الإكتئاب</h1>
            <div class="question active" id="question1">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 1</h3>
                    <div class="choices">
                        <p id="the_questions">القليل من الاهتمام أو المتعة في فعل الأشياء</p>
                        <label id="answer"><input type="radio" name="q1" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q1" value="0"> مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q1" value="2"> أكثر من نصف الأيام</label>
                    </div>
                    <label id="answer"><input type="radio" name="q1" value="3"> تقريبا كل يوم</label>
                </center>
                <button id="Next_btn" class="btn " onclick="next()">التالي</button>
            </div>


            <div class="question" id="question2">
                <center>
                    <h3 style="margin-bottom: 60px;">السؤال 2</h3>
                    <p id="the_questions">الشعور بالانخفاض أو الاكتئاب أو ميؤوس منه *</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q2" value="0"> مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q2" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q2" value="2"> أكثر من نصف الأيام</label>
                        <label id="answer"><input type="radio" name="q2" value="3"> تقريبا كل يوم</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">التالي</button>
                </center>
            </div>


            <div class="question" id="question3">
                <center>
                    <h3 style="margin-bottom: 60px;">السؤال 3</h3>
                    <p id="the_questions"> مشكلة في السقوط أو البقاء نائماً ، أو النوم كثيرًا</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q3" value="0"> مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q3" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q3" value="2"> أكثر من نصف الأيام</label>
                        <label id="answer"><input type="radio" name="q3" value="3"> تقريبا كل يوم</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">التالي</button>
                </center>
            </div>

            <div class="question" id="question4">
                <center>
                    <h3 style="margin-bottom: 60px;">السؤال 4</h3>
                    <p id="the_questions">الشعور بالتعب أو القليل من الطاقة</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q4" value="0"> مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q4" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q4" value="2"> أكثر من نصف الأيام</label>
                        <label id="answer"><input type="radio" name="q4" value="3"> تقريبا كل يوم</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">التالي</button>
                </center>
            </div>

            <div class="question" id="question5">
                <center>
                    <h3 style="margin-bottom: 60px;">السؤال 5</h3>
                    <p id="the_questions">شهية سيئة أو الإفراط في تناول الطعام</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q5" value="0">مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q5" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q5" value="2"> أكثر من نصف الأيام</label>
                        <label id="answer"><input type="radio" name="q5" value="3"> تقريبا كل يوم</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">التالي</button>
                </center>
            </div>

            <div class="question" id="question6">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 6</h3>
                    <p id="the_questions">الشعور بالسوء تجاه نفسك - أو أنك فاشل أو تركت نفسك أو لعائلتك </p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q6" value="0"> مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q6" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q6" value="2"> أكثر من نصف الأيام</label>
                        <label id="answer"><input type="radio" name="q6" value="3"> تقريبا كل يوم</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">التالي</button>
                </center>
            </div>

            <div class="question" id="question7">
                <center>
                    <h3 style="margin-bottom: 60px;">السؤال 7</h3>
                    <p id="the_questions">مشكلة في التركيز على الأشياء ، مثل قراءة الصحيفة أو مشاهدة التلفزيون</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q7" value="0"> مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q7" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q7" value="2"> أكثر من نصف الأيام</label>
                        <label id="answer"><input type="radio" name="q7" value="3"> تقريبا كل يوم</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">التالي</button>
                </center>
            </div>

            <div class="question" id="question8">
                <center>
                    <h3 style="margin-bottom: 60px;">السؤال 8</h3>
                    <p id="the_questions">التحرك أو التحدث ببطء بحيث يمكن أن يلاحظه الآخرون </p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q8" value="0"> مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q8" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q8" value="2"> أكثر من نصف الأيام</label>
                        <label id="answer"><input type="radio" name="q8" value="3"> تقريبا كل يوم</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">التالي</button>
                </center>
            </div>

            <div class="question" id="question9">
                <center>
                    <h3 style="margin-bottom: 60px;">السؤال 9</h3>
                    <p id="the_questions">أفكار أنك ستكون أفضل حالًا ، أو تؤذي نفسك </p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q9" value="0"> مُطْلَقاً</label>
                        <label id="answer"><input type="radio" name="q9" value="1"> عدة أيام</label>
                        <label id="answer"><input type="radio" name="q9" value="2"> أكثر من نصف الأيام</label>
                        <label id="answer"><input type="radio" name="q9" value="3"> تقريبا كل يوم</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">التالي</button>
                </center>
            </div>

            <div class="question" id="question10">
                <center>
                    <h3 style="margin-bottom: 60px;">سؤال 10</h3>
                    <p id="the_questions"> إذا كان لديك أي أيام مع مشكلات أعلاه ، فما مدى صعوبة هذه المشاكل لك في العمل أو المنزل أو المدرسة أو مع أشخاص آخرين؟</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q10" value="0"> ليس من الصعب على الإطلاق</label>
                        <label id="answer"><input type="radio" name="q10" value="1"> صعب إلى حد ما</label>
                        <label id="answer"><input type="radio" name="q10" value="2"> صعب جدا</label>
                        <label id="answer"><input type="radio" name="q10" value="3"> صعب للغاية</label>
                    </div>
                    <button id="Submit_btn" class="btn " onclick="next()">يُقدِّم</button>
                </center>
            </div>
    </section>
    <dialog id="dialog">
        <div class="content">
            <div class="delete">
                <button class="x" onclick="dialog.close()">
                    <i class="fa-solid fa-square-xmark"></i>
                </button>
            </div>
            <div class="text">
                <p id="body">
                </p>
                <button onclick="location.href='/psy/ar'" class="pop-btn">ساعدني</button>
                <button onclick="location.href='/'" class="pop-btn">العودة لصفحة الرئيسية</button>
            </div>
        </div>
    </dialog>
    <!-- end depression test -->
    <?php include("resources/views/components/rtl/footer.rtl.html") ?>
    <!-- JS -->
    <script src="/resources/js/navbar.js"></script>
    <script src="/resources/js/up.js"></script>
    <script src="/resources/js/depression.js"></script>

</body>
<script src="/app.js"></script>

</html>