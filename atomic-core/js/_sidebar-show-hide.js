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

$(".js-hideSide").on('click', function(event) {
  $.Velocity.RunSequence(sideClose);
});


var titleClose = [
  { elements: $(".compTitle"), properties: { height: "0", opacity: "0" }, options: { duration: 200, sequenceQueue: false } }, 
];
var codeOpen = [
  { elements: $(".atoms-code-example"), properties: { height: "100%" , opacity:"1"}, options: { duration: 200, sequenceQueue: false } }, 
];



$(".js-hideTitle").on('click', function(event) {
  
  
  if($('.compTitle').css('height') == '0px'){ 
  
     //$.Velocity.RunSequence(codeOpen); 
     $(".compTitle").animateAuto("height", 200, "linear"); 
     $(".compTitle").velocity({
        opacity: "1",
    }, {
        duration: 200
    });
     
  } else { 
     
     $.Velocity.RunSequence(titleClose); 
          
     
  }

});

/*$('.js-hideTitle').on('click', function(event) {
  $('.compTitle').toggleClass('compTitle-close');
});*/




var codeClose = [
  { elements: $(".atoms-code-example"), properties: { height: "0", opacity: "0" }, options: { duration: 200, sequenceQueue: false } }, 
];
var codeOpen = [
  { elements: $(".atoms-code-example"), properties: { height: "100%" , opacity:"1"}, options: { duration: 200, sequenceQueue: false } }, 
];



$(".js-hideCode").on('click', function(event) {
  
  
  if($('.atoms-code-example').css('height') == '0px'){ 
  
     //$.Velocity.RunSequence(codeOpen); 
     $(".atoms-code-example").animateAuto("height", 200, "linear"); 
     $(".atoms-code-example").velocity({
        opacity: "1",
    }, {
        duration: 200
    });
     
  } else { 
     
     $.Velocity.RunSequence(codeClose); 
          
     
  }

});





jQuery.fn.animateAuto = function(prop, speed, callback){
    var elem, height, width;
    return this.each(function(i, el){
        el = jQuery(el), elem = el.clone().css({"height":"auto","width":"auto"}).appendTo("body");
        height = elem.css("height"),
        width = elem.css("width"),
        elem.remove();
        
        if(prop === "height")
            el.animate({"height":height}, speed, callback);
        else if(prop === "width")
            el.animate({"width":width}, speed, callback);  
        else if(prop === "both")
            el.animate({"width":width,"height":height}, speed, callback);
    });  
}

/*$('.js-hideCode').on('click', function(event) {
  $(this).addClass('js-showCode');
  $('.atoms-code-example').toggleClass('atoms-code-example-close');
  $('.atoms-code-example').velocity({
      height: "0",
    }, {
        duration: 250,
        easing: "swing"
    });
});

$('.js-hideCode.js-showCode').on('click', function(event) {
  $('.atoms-code-example').velocity({
      height: "100%",
    }, {
        duration: 250,
        easing: "swing"
    });
});*/




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










 
	


