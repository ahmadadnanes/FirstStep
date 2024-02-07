$('#submit').on('click' , function (event){
    event.preventDefault();
    let userId = $("input[name=user_id]").val();
    let diaryId =  $("input[name=diary_id]").val();
    let comment = $("#comment").val();
    if(comment){
        if(window.location.pathname === "/diaryById/"){
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
        } else if(window.location.pathname === "/comment/") {
            toCommentId = $("input[name=to_comment_id]").val();
            $.ajax({
                type: "POST",
                url: '/addreply',
                data:
                {
                    user_id: userId ,
                    diary_id: diaryId,
                    to_comment_id: toCommentId,
                    comment: comment
                },
                success: function(response){
                    $(".all_comments").append(response);
                }
            }
            )
        }
    } else {
        return false
    }
}
)

