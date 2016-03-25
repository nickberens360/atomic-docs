// JavaScript Document

$(".js-hideAll").on('click', function(event) {
    
    
   
    
if($('.auto-h1').css('opacity') == '0'){ 
      
      $(this).css('color','#00AFF0');
      
      
      $('.compWrap').velocity({
          opacity: "1",
      }, {
          duration: 200
      });
      
      $('.auto-side').velocity({
          opacity: "1",
      }, {
          duration: 200
      });
      $('.auto-side_show').velocity({
        opacity: "1",
    }, {
        duration:500
    });
      $('.auto-h1').velocity({
          opacity: "1",
      }, {
          duration: 200
      });
  } else { 
  
     $(this).css('color','#EB6565');
     $thisComp = $(this).closest('.compWrap');
     
    
    $('.compWrap').not($thisComp).velocity({
        opacity: "0",
    }, {
        duration: 200
    });

    
    $('.auto-side_show').velocity({
        opacity: "0",
    }, {
        duration: 0
    });
    
    $('.auto-side').velocity({
        opacity: "0",
    }, {
        duration: 200
    });
    $('.auto-h1').velocity({
        opacity: "0",
    }, {
        duration: 200
    });
  }
});