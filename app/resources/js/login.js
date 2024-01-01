let success = document.getElementById("success");

if(success !== null){
    setTimeout(() =>{
        if(success.style.display !== "none"){
            success.style.display = "none";
        }
    }, 4000);
}
