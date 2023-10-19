let current = 1;
let qu = 10;
let answers = [];
function next(){
  let question = document.querySelector('input[name="q' + current + '"]:checked').value;
  answers.push(parseInt(qu));

  document.getElementById('question' + current).classList.remove('active');
      current++;
      if (current <= qu) {
        document.getElementById('question' + current).classList.add('active');
      } 
      else {
        displayResult();
      }
}

function displayResult(){
  let score = 0;


  for(let i = 1 ; i <= answers.length ; i++){
    score += answers[i];
  }

  let resultMessage = "";
      if(score === 0)
      {
        window.alert("You are good press ok to redirect to the home page");
        location.href = "../Home.php";
      }
      else if (score > 0 && score <= 4) {
        resultMessage = "You are experiencing minimal depressive symptoms.";
      } else if (score >= 5 && score <= 9) {
        resultMessage = "You have mild depressive symptoms.";
      } else if (score >= 10 && score <= 14) {
        resultMessage = "You have moderate depressive symptoms.";
      } else if (score >= 15 && score <= 19) {
        resultMessage = "You have moderately severe depressive symptoms.";
      } else {
        resultMessage = "You have severe depressive symptoms. It is important to seek professional help.";
      }
      a = window.confirm(resultMessage + " " + "Click Ok So We can help you or press no and you will be redirect to the Home page ");
      if (a) {
            location.href = "../Recommended psy.php";
        } else {
            location.href = "../Home.php";
        }
}