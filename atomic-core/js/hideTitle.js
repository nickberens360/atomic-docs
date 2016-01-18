var titleClose = [
  { elements: $(".compTitle"), properties: { height: "0", opacity: "0" }, options: { duration: 200, sequenceQueue: false } }, 
];
$(".js-hideTitle").on('click', function(event) {
  if($('.compTitle').css('height') == '0px'){ 
     $(this).css('color','#fff');
     $(".compTitle").animateAuto("height", 200, "linear"); 
     $(".compTitle").velocity({
        opacity: "1",
    }, {
        duration: 200
    });
  } else { 
     $(this).css('color','#247695');
     $.Velocity.RunSequence(titleClose); 
  }
});