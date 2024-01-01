let show = document.getElementById("show");
let password = document.getElementById("password");
show.addEventListener('click' , () =>{ 
    if(show.classList.contains("show") && password.value.length !== 0){
        password.type = "text";
        show.classList.replace("show", "hide");
        show.classList.replace("fa-solid" , "fas");
        show.classList.replace("fa-eye" , "fa-eye-slash");
    }else{
        password.type = "password";
        show.classList.replace("hide" , "show");
        show.classList.replace("fas" , "fa-solid");
        show.classList.replace("fa-eye-slash" , "fa-eye");
    }
});