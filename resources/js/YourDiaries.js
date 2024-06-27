// let form = document.getElementById("deleteForm");
// // console.log(form)
// let popup = document.getElementById("popup");

// let deleteButton = document.getElementById("del");
// let cancelButton = document.getElementById("cancel");
// let diary = document.getElementsByClassName(".diary_container");
let x = document.getElementsByClassName('x');
for(let i = 0 ; i < x.length ; i++){
    x[i].onclick = () =>{
        let con = confirm("are you sure");
        if(con){
                let diary_id = x[i].value;
                console.log(diary_id);
                $.ajax({
                    type: "POST",
                    url: '/profile',
                    data:
                    {
                        delete: diary_id
                    },
                    success: function(response){
                        console.log(response);
                        let deletedDiary = document.getElementById(`${diary_id}`);
                        deletedDiary.remove();
                    }
                }
                )
            };
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