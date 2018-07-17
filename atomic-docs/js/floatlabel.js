jQuery( document ).ready(function( $ ) {


$(function(){
  var onClass = "on";
  var showClass = "show";
  var labelOn = "labelOn";
  
  $(".js-floatInput").bind("checkval",function(){
    var label = $(this).prev(".js-floatLabel");
    if(this.value !== ""){
      label.addClass(showClass);
      $(this).parent().addClass(labelOn);
    } else {
      label.removeClass(showClass);
      $(this).parent().removeClass(labelOn);
    }
  }).on("keyup",function(){
    $(this).trigger("checkval");
  }).on("focus",function(){
    $(this).prev(".js-floatLabel").addClass(onClass);
    
  }).on("blur",function(){
      $(this).prev(".js-floatLabel").removeClass(onClass);
  }).trigger("checkval");
});


});




//$(function(){
//  var onClass = "on";
//  var showClass = "show";
//  var labelOn = "labelOn";
//  
//  $("textarea").bind("checkval",function(){
//    var label = $(this).prev("label");
//    if(this.value !== ""){
//      label.addClass(showClass);
//      $(this).parent().addClass(labelOn);
//    } else {
//      label.removeClass(showClass);
//      $(this).parent().removeClass(labelOn);
//    }
//  }).on("keyup",function(){
//    $(this).trigger("checkval");
//  }).on("focus",function(){
//    $(this).prev("label").addClass(onClass);
//    
//  }).on("blur",function(){
//      $(this).prev("label").removeClass(onClass);
//  }).trigger("checkval");
//});