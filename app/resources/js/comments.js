$('#submit').on('click' , function (event){
    event.preventDefault();
    let userId = $("input[name=user_id]").val();
    let diaryId =  $("input[name=diary_id]").val();
    let comment = $("#comment").val();
    if(comment){
        $.ajax({
            type: "POST",
            url: '/comment',
            data:
            {
                user_id: userId ,
                diary_id: diaryId,
                comment: comment
            },
            success: function(response){
                object = response;
                $(".all_comments").append(`
                    <div class='comment'> 
                        <p>${object.comment}</p>
                    </div>
                `);
            }
        }
        )
    } else {
        return false
    }
}
)

