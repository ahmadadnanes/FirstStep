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