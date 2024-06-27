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
