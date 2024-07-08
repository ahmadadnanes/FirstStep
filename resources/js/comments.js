// insert comment

$('#submit').on('click' , function (event){
    event.preventDefault();
    let userId = $("input[name=user_id]").val();
    let diaryId =  $("input[name=diary_id]").val();
    let comment = $("#comment").val();
    let token = $("input[name=token").val();
    let toCommentId = $("input[name=to_comment_id]").val();
    if(toCommentId == undefined) {toCommentId = null};
    if(comment){
        $.ajax({
            type: "POST",
            url: '/comment/create',
            data:
            {
                user_id: userId ,
                diary_id: diaryId,
                to_comment_id:  toCommentId,
                comment: comment,
                token: token
            },
            success: function(response){
                $(".all_comments").append(response);
                $("#comment").val("");
            }
        })
    }
});

// delete comment
let delete_form = document.getElementsByClassName('delete_form');
let del_id = "";
for(let i = 0 ; i < delete_form.length ; i++){
    delete_form[i].onclick =  function(e) {
        e.preventDefault();
        if(confirm('are you sure?')){
            del_id = $(".xComment").val();
            let token = $('input[name=token]').val();
            $.ajax({
                type: "POST",
                url: '/comment/delete',
                data:{
                    delete_id: del_id,
                    token: token
                },
                success: function(response){
                    console.log(response);
                    $(`#${del_id}`).remove();
                }
            })
        }
    };
}





