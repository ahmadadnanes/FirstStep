$('#submit').on('click' , function (event){
    event.preventDefault();
    let userId = $("input[name=user_id]").val();
    let diaryId =  $("input[name=diary_id]").val();
    let comment = $("#comment").val();
    if(comment){
        $.ajax({
            type: "POST",
            url: '/addcomment',
            data:
            {
                user_id: userId ,
                diary_id: diaryId,
                comment: comment
            },
            success: function(response){
                $(".all_comments").append(response);
            }
        }
        )
    } else {
        return false
    }
}
)

