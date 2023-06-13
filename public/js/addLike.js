$(document).ready(function(){
    $("#like").on('click', function(){
        let data = [];
        data['likeToken'] = $("#like_token").val();
        data['productId'] = $("#like_product_id").val();
        console.groupCollapsed(data);
    });
});