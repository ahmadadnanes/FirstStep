if($('#search').val() == ""){
    $("#search").on("change" , () => {
        $.ajax({
            type: "post",
            url: "/diary/search",
            data:
            {
                user: $('#search').val
            },
            success: function (response) {
                console.log('hi')
            }
        });
    })
}

let x = document.getElementsByClassName('delete_form');
for(let i = 0 ; i < x.length ; i++){
    x[i].onclick = (e) =>{
        e.preventDefault();
        let con = confirm("are you sure");
        if(con){
                let diary_id = $('.x').val();
                let token = $('input[name=token]').val();
                console.log(diary_id);
                $.ajax({
                    type: "POST",
                    url: '/diary/delete',
                    data:
                    {
                        delete: diary_id,
                        token : token
                    },
                    success: function(response){
                        let deletedDiary = document.getElementById(`${diary_id}`);
                        deletedDiary.remove();
                    }
                }
                )
            };
        }
}
