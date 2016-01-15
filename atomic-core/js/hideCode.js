var codeClose = [
  { elements: $(".atoms-code-example"), properties: { height: "0", opacity: "0" }, options: { duration: 200, sequenceQueue: false } }, 
];
$(".js-hideCode").on('click', function(event) {
  if($('.atoms-code-example').css('height') == '0px'){ 
     $(this).css('color','#fff');
     $(".atoms-code-example").animateAuto("height", 200, "linear"); 
     $(".atoms-code-example").velocity({
        opacity: "1",
    }, {
        duration: 200
    });
  } else { 
     $(this).css('color','#247695');
     $.Velocity.RunSequence(codeClose); 
  }
});
