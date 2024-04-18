let form = document.getElementById("deleteForm");
// console.log(form)
let popup = document.getElementById("popup");

let deleteButton = document.getElementById("del");
let cancelButton = document.getElementById("cancel");
if(form !== null){
    form.onsubmit = (event) =>{
        event.preventDefault();
        let con = confirm("are you sure");
        if(con){
                let diary_id = $("input[name=delete]").val();
                $.ajax({
                    type: "POST",
                    url: '/diary',
                    data:
                    {
                        delete: diary_id
                    },
                    success: function(response){
                        console.log(response);
                        $("#YourDiariesContainer").remove(`#${diary_id}`);
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