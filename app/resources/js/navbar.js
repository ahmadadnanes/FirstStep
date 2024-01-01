let button = document.getElementById("nav_button");
let ul = document.getElementById("nav_ul");

button.onclick = function(){
    if(ul.style.display === "block"){
        ul.style.display = "none";
    }
    else{
        ul.style.display = "block";
    }
}