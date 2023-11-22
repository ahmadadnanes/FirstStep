// if('serviceWorker' in navigator){
//     navigator.serviceWorker.register('/sw.js');
// }

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

