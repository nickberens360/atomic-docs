var notesClose = [
  { elements: $(".compNotes"), properties: { height: "0", opacity: "0" }, options: { duration: 200, sequenceQueue: false } }, 
];
$(".js-hideNotes").on('click', function(event) {
  if($('.compNotes').css('height') == '0px'){ 
     $(this).css('color','#fff');
     $(".compNotes").animateAuto("height", 200, "linear");
     /*outHeight = $(".compNotes").outerHeight();
     $(".compNotes").css('height', outHeight).css('padding-bottom','20px');*/
     $(".compNotes").velocity({
        opacity: "1",
    }, {
        duration: 200
    });
  } else { 
     $(this).css('color','#247695');
     $.Velocity.RunSequence(notesClose); 
  }
});
