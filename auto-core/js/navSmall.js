var navOpen = [
  { elements: $(".auto-side"), properties: { top: "0" }, options: { duration: 200} }, 
];
var navClose = [
  { elements: $(".auto-side"), properties: { top: "-100%" }, options: { duration: 200} }, 
];



$(".auto-side_show-small").on('click', function(event) {
  
  
  if($('.auto-side').css('top') == '0px'){ 
  
     $.Velocity.RunSequence(navClose); 
     
  } else { 
     
     $.Velocity.RunSequence(navOpen); 
     
  }

});









//var sideClose = [
//  { elements: $(".auto-side"), properties: { translateX: "-100%" }, options: { duration: 200} }, 
//  { elements: $(".auto-main"), properties: { paddingLeft:"40px"}, options: { duration: 200, sequenceQueue: false } },
//  { elements: $(".auto-side_show"), properties: { left: "7px" }, options: { duration: 300} }
//];
//
//$(".auto-side_show-small").on('click', function(event) {
//  $.Velocity.RunSequence(sideClose);
//});