let 
show = document.querySelector("#show") , 
password = document.getElementById("password") ,
OldPassword = document.getElementById("OldPassword") ,
NewPassword = document.getElementById("NewPassword") , 
showOld = document.querySelector("#showOld"),
showNew = document.querySelector("#showNew");

if(password !== null){
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
    };
});
}else{
showOld.addEventListener('click' , () => {
    if(showOld.classList.contains("show") && OldPassword.value.length !== 0){
        OldPassword.type = "text";
        showOld.classList.replace("show", "hide");
        showOld.classList.replace("fa-solid" , "fas");
        showOld.classList.replace("fa-eye" , "fa-eye-slash");
    }else{
        OldPassword.type = "password";
        showOld.classList.replace("hide" , "show");
        showOld.classList.replace("fas" , "fa-solid");
        showOld.classList.replace("fa-eye-slash" , "fa-eye");
    };
});
showNew.addEventListener('click' , () => {
    if(showNew.classList.contains("show") && NewPassword.value.length !== 0){
        NewPassword.type = "text";
        showNew.classList.replace("show", "hide");
        showNew.classList.replace("fa-solid" , "fas");
        showNew.classList.replace("fa-eye" , "fa-eye-slash");
    }else{
        NewPassword.type = "password";
        showNew.classList.replace("hide" , "show");
        showNew.classList.replace("fas" , "fa-solid");
        showNew.classList.replace("fa-eye-slash" , "fa-eye");
    };
});
}

function showFun(idName , inputName){

if(idName.classList.contains("show") && inputName.value.length !== 0){
    inputName.type = "text";
    idName.classList.replace("show", "hide");
    idName.classList.replace("fa-solid" , "fas");
    idName.classList.replace("fa-eye" , "fa-eye-slash");
}else{
    inputName.type = "password";
    idName.classList.replace("hide" , "show");
    idName.classList.replace("fas" , "fa-solid");
    idName.classList.replace("fa-eye-slash" , "fa-eye");
}
}
