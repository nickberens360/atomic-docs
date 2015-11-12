function actionsWidth(){
	$side = $('.atoms-side');
	$body = $('body');
	$action = $('.ad_js-actionDrawer');
	sideWidth = $($side).outerWidth();
	bodyWidth = $('body').outerWidth();
	$action.css('width', bodyWidth - sideWidth - 1);	
}

actionsWidth();
$( window ).resize(function() {
  actionsWidth();
});



var actionOpen = [
  { elements: $(".ad_js-actionDrawer"), properties: { right:"auto"}, options: { duration: 300} },
  
];

var actionClose = [
  { elements: $(".ad_js-actionDrawer"), properties: { right:"-100%"}, options: { duration: 300} }, 
];


$(".ad_js-actionOpen").on('click', function(event) {
  event.preventDefault();
  $.Velocity.RunSequence(actionOpen);
});

$(".ad_js-actionClose").on('click', function(event) {
  event.preventDefault();
  $.Velocity.RunSequence(actionClose);
});


/*ajax calls*/
/*$('.ad_actionBtn').click(function(e){
    e.preventDefault();	
		$('#js_actionDrawer__content').load($(this).prop("href")); 
 
});*/



/*$('.ad_actionBtn').click(function(event) {
   event.preventDefault();
 
   $.ajax(this.href, {
      success: function(data) {      
         $('#js_actionDrawer__content').html($(data));
      },
      error: function() {
         alert('did not worked!');
      }
   });
});*/


$('.ad_actionBtn').click(function(event) {
   event.preventDefault();
 
   $.ajax(this.href, {
      success: function(data) {      
         $('#js_actionDrawer__content').html($(data));
      },
      error: function() {
         alert('did not worked!');
      }
   });
});
    



























