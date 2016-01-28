if ($(".atoms-code-example")[0]){
    $(".js-hideCode").on('click', function(event) {
      if($('.atoms-code-example').css('opacity') == '0'){ 
         $(this).css('color','#fff');
         $(".atoms-code-example").velocity({
            opacity: "1",
         }, {
            duration: 200
         });
      } else { 
         $(this).css('color','#247695');
         $(".atoms-code-example").velocity({
            opacity: "0",
         }, {
            duration: 200
         });
      }
    });
} 