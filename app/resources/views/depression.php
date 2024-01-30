<?php
@session_start();
$user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css files -->
    <?php include("./app/resources/components/layout.html") ?>
    <title>Depression Test</title>
</head>

<body class="dep">
    <?php include("./app/resources/components/header.php") ?>
    <?php include("./app/resources/components/up.html") ?>
    <!-- start depression test -->
    <section>

        <div class="container">
            <h1 id="htr">Help us match you to the <span style="color:#4B7B3F;"> right therapist</span></h1>
            <br><br>

            <div class="container">
                <p class="paragraph">
                    Please fill out this short questionnaire to provide some background information about you and the issues you'd like to deal with in therapy. It would help us match you with the most suitable therapist for you. Your answers will also give this therapist a good starting point in getting to know you.
                    Use the tab key to navigate this questionnaire and use enter key to confirm selection. Once you use the click/use enter key to select an answer for the current question, we will move to the next question in the list.
                </p>
            </div>
        </div>
        <br> <br>

        <div class="container">
            <h1 id="dep">Depression Test</h1>
            <div class="question active" id="question1">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 1</h3>
                    <p id="the_questions">Little interest or pleasure in doing things</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q1" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q1" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q1" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q1" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>


            <div class="question" id="question2">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 2</h3>
                    <p id="the_questions">Feeling down, depressed, or hopeless *</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q2" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q2" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q2" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q2" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>


            <div class="question" id="question3">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 3</h3>
                    <p id="the_questions"> Trouble falling or staying asleep, or sleeping too much</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q3" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q3" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q3" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q3" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>

            <div class="question" id="question4">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 4</h3>
                    <p id="the_questions">Feeling tired or having little energy</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q4" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q4" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q4" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q4" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>

            <div class="question" id="question5">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 5</h3>
                    <p id="the_questions">Poor appetite or overeating</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q5" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q5" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q5" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q5" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>

            <div class="question" id="question6">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 6</h3>
                    <p id="the_questions">Feeling bad about yourself - or that you are a failure or have let yourself or your family down </p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q6" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q6" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q6" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q6" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>

            <div class="question" id="question7">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 7</h3>
                    <p id="the_questions">Trouble concentrating on things, such as reading the newspaper or watching television</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q7" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q7" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q7" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q7" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>

            <div class="question" id="question8">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 8</h3>
                    <p id="the_questions">Moving or speaking so slowly that other people could have noticed </p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q8" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q8" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q8" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q8" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>

            <div class="question" id="question9">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 9</h3>
                    <p id="the_questions">Thoughts that you would be better off dead, or of hurting yourself </p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q9" value="0"> Not at all</label>
                        <label id="answer"><input type="radio" name="q9" value="1"> Several days</label>
                        <label id="answer"><input type="radio" name="q9" value="2"> More than half of the days</label>
                        <label id="answer"><input type="radio" name="q9" value="3"> Nearly every day</label>
                    </div>
                    <button id="Next_btn" class="btn " onclick="next()">Next</button>
                </center>
            </div>

            <div class="question" id="question10">
                <center>
                    <h3 style="margin-bottom: 60px;">Question 10</h3>
                    <p id="the_questions"> If you've had any days with issues above, how difficult have these problems made it for you at work, home, school, or with other people?</p>
                    <div class="choices">
                        <label id="answer"><input type="radio" name="q10" value="0"> Not difficult at all</label>
                        <label id="answer"><input type="radio" name="q10" value="1"> Somewhat difficult</label>
                        <label id="answer"><input type="radio" name="q10" value="2"> Very difficult</label>
                        <label id="answer"><input type="radio" name="q10" value="3"> Extremely difficult</label>
                    </div>
                    <button id="Submit_btn" class="btn " onclick="next()">Submit</button>
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
                <button onclick="location.href='/psy'" class="pop-btn">Help me</button>
                <button onclick="location.href='/'" class="pop-btn">Return Home</button>
            </div>
        </div>
    </dialog>
    <!-- <div class="popup" id="popup">
        <div class="overlay"></div>
        <div class="content">
            <div class="delete">
                <button class="x" onclick="pop('close')">
                    <i class="fa-solid fa-square-xmark"></i>
                </button>
            </div>
            <div class="text">
                <p id="body">
                </p>
                <button onclick="location.href='/psy'" class="pop-btn">Help me</button>
                <button onclick="location.href='/'" class="pop-btn">Return Home</button>
            </div>
        </div>
    </div> -->
    <!-- end depression test -->
    <?php include("./app/resources/components/footer.html") ?>
    <!-- JS -->
    <script src="/app/resources/js/navbar.js"></script>
    <script src="/app/resources/js/up.js"></script>
    <script src="/app/resources/js/depression.js"></script>

</body>
<script src="/app.js"></script>

</html>