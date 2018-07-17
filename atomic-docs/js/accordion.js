jQuery( document ).ready(function( $ ) {
  
  var question = $('.nAccordian .question');
  var answer = $('.nAccordian .answer');
 
 $(question).click(function(){
    $(answer).slideUp('fast');
    $(this).parent().removeClass('nAccordian-open');
    
    if($(this).next().is(':hidden')){
       $(this).next().slideDown('fast');
       $(this).parent().addClass('nAccordian-open');
    }
    
  });  
   
});