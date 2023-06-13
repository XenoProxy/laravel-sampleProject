$(document).ready(function (){
  $("#send_review").on('click', function(){
      let mark = $('#review_mark').val()
      let text = $('#review_text').val()
      let productId = $('#product_id').val()
      let token = $('#token').val()
      console.log(token)
      $.post('add-comment', {text: text,
          mark:mark,
          product_id:productId,
          _token: token,
        }).done(function (response){
          console.log(response)
          response = JSON.parse(response);
          $("#comments").append(
            "<div>Mark:"+response.mark+"</div>"+"<div>Comment:"+response.text+"</div>"
          );
      });
  })
});