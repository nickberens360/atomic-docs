var sideOpen = [
  { elements: $(".atoms-side_show"), properties: { left: "-100%" }, options: { duration: 300} },
  { elements: $(".atoms-side"), properties: { translateX: "0" }, options: { duration: 200} }, 
  { elements: $(".atoms-main"), properties: { paddingLeft:"282px"}, options: { duration: 200, sequenceQueue: false } },
  
];

$(".atoms-side_show ").on('click', function(event) {
  event.preventDefault();
  $.Velocity.RunSequence(sideOpen);
});





var sideClose = [
  { elements: $(".atoms-side"), properties: { translateX: "-100%" }, options: { duration: 200} }, 
  { elements: $(".atoms-main"), properties: { paddingLeft:"40px"}, options: { duration: 200, sequenceQueue: false } },
  { elements: $(".atoms-side_show"), properties: { left: "7px" }, options: { duration: 300} }
];

$(".atoms-side_hide").on('click', function(event) {
  $.Velocity.RunSequence(sideClose);
});







/*var navOpen = [
  { elements: $(".atoms-side"), properties: { left:"auto"}, options: { duration: 300} },
  
];

var navClose = [
  { elements: $(".atoms-side"), properties: { left:"-100%"}, options: { duration: 300} }, 
];*/


/*$(".compTitle").click(function() {
  $(".atoms-side").velocity({
      top: "-100%"
    }, {
        duration: 250,
        easing: "swing"
    });
});

$(".atoms-side_show").click(function() {
  $(".atoms-side").velocity({
      top: "0"
    }, {
        duration: 250,
        easing: "swing"
    });
});*/


/*

if ($(window).width() < 823) {
   $('.atoms-side_show').addClass('navToggle');
}
else {
   ('atoms-side_show').removeClass('navToggle');
}




$( window ).resize(function() {
  if ($(window).width() < 823) {
       $('.atoms-side_show').addClass('navToggle').removeClass('atoms-side_show');
    }
    else {
       $('.navToggle').addClass('atoms-side_show').removeClass('navToggle');
    }
});
*/








/*

$('.navToggle').click(function() {
   
   $('.atoms-side').slideToggle('fast');
   
   

});*/




/*function sidebar(){
	var $side = $('.atoms-side');
	var $main = $('.atoms-main');
	var $showBtn = $('.atoms-side_show');
	var $catForm = $('.cat-form-group');
	
	$showBtn.css('left', '-100px');
	$catForm.css('left', '0');
	$side.css('left', '0');
	sideBarWidth = $( ".atoms-side_hide" ).outerWidth();
	
    $('.atoms-main').css('padding-left',sideBarWidth+20);
}

function noSidebar(){
	var $side = $('.atoms-side');
	var $main = $('.atoms-main');
	var $showBtn = $('.atoms-side_show');
	var $catForm = $('.cat-form-group');
	
	$showBtn.css('left', '10px');
	$catForm.css('left', '-500px');
	$side.css('left', '-500px');
	$main.css('padding-left', '20px').css('width', '100%');
}

$( ".atoms-side_hide" ).click(function() {
	noSidebar()
});

$( ".atoms-side_show" ).click(function() {
	sidebar()
});



sideBarWidth = $( ".atoms-side_hide" ).outerWidth();
	
$('.atoms-main').css('padding-left',sideBarWidth+20);*/










 
	


