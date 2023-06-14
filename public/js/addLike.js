$(document).ready(function(){
    $("#like").on('click', function(){
        let data = {};
        data['_token'] = $("#like_token").val();
        data['productId'] = $("#like_product_id").val();
        console.log(data);
        $.post('like', data, function(){

        }).done(function(response){
            let message = JSON.parse(response)
            //$("#likeField").empty();
            $("#isLiked").append(message.message)
            $("#isLiked").show()
            $('#likeField').empty();
            $('#likeField').append(message.likes)
            setTimeout(hide, 3000);
        });
    });
});