let 
show = document.querySelectorAll(".change")  , 
password = document.querySelectorAll(".passwordInput") ,
OldPassword = document.getElementById("OldPassword") ,
NewPassword = document.getElementById("NewPassword") , 
showOld = document.querySelector("#showOld"),
showNew = document.querySelector("#showNew");
if(show.length == 0){
    console.log(showOld);
    console.log(showNew);
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
for(let i = 0 ; i < show.length ; i++){
    show[i].addEventListener('click' , () =>{
        if(show[i].classList.contains("show") && password[i].value.length !== 0){
            password[i].type = "text";
            show[i].classList.replace("show", "hide");
            show[i].classList.replace("fa-solid" , "fas");
            show[i].classList.replace("fa-eye" , "fa-eye-slash");
        }else{
            password[i].type = "password";
            show[i].classList.replace("hide" , "show");
            show[i].classList.replace("fas" , "fa-solid");
            show[i].classList.replace("fa-eye-slash" , "fa-eye");
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
