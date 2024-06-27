let button = document.getElementById("nav_button");
let user = document.getElementById("user");
let ul = document.getElementById("nav_ul");
let UserUl = document.getElementById("nav_ul_user");

button.onclick = function(){
    if(ul.style.display === "block"){
        ul.style.display = "none";
    }
    else{
        ul.style.display = "block";
    }
}

user.onclick = function(event){
    event.preventDefault()
    if(UserUl.style.display === "block"){
        UserUl.style.display = "none";
    }
    else{
        UserUl.style.display = "block";
    }
}
