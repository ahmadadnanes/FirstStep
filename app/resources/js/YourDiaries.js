let form = document.getElementById("deleteForm");
console.log(form)
let popup = document.getElementById("popup");

let deleteButton = document.getElementById("del");
let cancelButton = document.getElementById("cancel");
if(form !== null){
    form.onsubmit = (event) =>{
        let con = confirm("are you sure");

        if(!con){
            event.preventDefault();
        }
    }
}

// function confirmOrDelete(){
//     if(cancelButton.addEventListener('click' , (event) =>{
//         return event.target.value;
//     })){
//         return false;
//     }else{
//         return true;
//     }
// }

function popDiary(){
    popup.classList.toggle("active");
}