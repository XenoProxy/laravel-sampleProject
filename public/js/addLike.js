$(document).ready(function(){
    $("#like").on('click', function(){
        let data = {};
        data['_token'] = $("#like_token").val();
        data['productId'] = $("#like_product_id").val();
        console.log(data);
        $.post('like', data, function(){

        }).done(function(response){
            console.log(response);
        });
    });
});