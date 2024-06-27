// insert comment

$('#submit').on('click' , function (event){
    event.preventDefault();
    let userId = $("input[name=user_id]").val();
    let diaryId =  $("input[name=diary_id]").val();
    let comment = $("#comment").val();
    if(comment){
        if(window.location.pathname === "/diary/show/"){
            $.ajax({
                type: "POST",
                url: '/comment/create',
                data:
                {
                    user_id: userId ,
                    diary_id: diaryId,
                    comment: comment
                },
                success: function(response){
                    console.log(response);
                    $(".all_comments").append(response);
                    comment.val = "";
                }
            }
            )
        } else if(window.location.pathname === "/comment/") {
            toCommentId = $("input[name=to_comment_id]").val();
            $.ajax({
                type: "POST",
                url: '/reply/create',
                data:
                {
                    user_id: userId ,
                    diary_id: diaryId,
                    to_comment_id: toCommentId,
                    comment: comment
                },
                success: function(response){
                    console.log(response);
                    $(".all_comments").append(response);
                    comment.val = "";
                }
            }
            )
        }
    } else {
        return false
    }
}
)

// delete comment
if(window.location.pathname === "/profile/"){

}
let xComment = document.getElementsByClassName('xComment');
for(let i = 0 ; i < xComment.length ; i++){
    x[i].onclick =  function() {
        let del_id = x[i].val;
        $.ajax({
            type: "POST",
            url: '/comment/delete/:id',
            data:{
                delete_id: del_id
            },
            success: function(response){
                console.log(response);
                $(`#${del_id}`).remove();
            }
        })
    };
}


