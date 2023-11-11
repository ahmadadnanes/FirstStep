let button = document.getElementById("nav_button");
let ul = document.getElementById("nav_ul");
let user = document.getElementById("user");
let user_ul = document.getElementById("user_ul");

if(user !== null){
    user.addEventListener("click" , () =>{
        if(user_ul.style.display === "block"){
            user_ul.style.display = "none";
        }
        else{
            user_ul.style.display = "block";
        }
    });
}


button.onclick = function(){
    if(ul.style.display === "block"){
        ul.style.display = "none";
    }
    else{
                ul.style.display = "block";
    }
}



let btn = document.querySelector("#up");
if(btn !== null){
    window.onload = scrollbtn;
    window.onscroll = scrollbtn;
    function scrollbtn(){
        if(window.scrollY >= 100){
            btn.style.display = "block";
        }
        else{
            btn.style.display = "none";
        }
    }
    
    btn.onclick = function(){
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }
}

