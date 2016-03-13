$( document ).ready(function() {


$('.component').each(function() {
	
  bgLength = $(this).css('background-color').length;

  if(bgLength > 16){
	$(this).addClass('component-hasBg');
  }

});	
  

  
  
  
});