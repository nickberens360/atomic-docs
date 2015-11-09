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
  /*{ elements: $("#js-side"), properties: { translateX: [0, "-100%"]}, options: { duration: 300 } },
  { elements: $("#js-main"), properties: { paddingLeft: "250px"}, options: { duration: 300, sequenceQueue: false } },*/
  
];

var actionClose = [
  { elements: $(".ad_js-actionDrawer"), properties: { right:"-100%"}, options: { duration: 300} },
  /*{ elements: $("#js-side"), properties: { translateX: [0, "-100%"]}, options: { duration: 300 } },
  { elements: $("#js-main"), properties: { paddingLeft: "250px"}, options: { duration: 300, sequenceQueue: false } },*/
  
];


$(".ad_js-actionOpen").on('click', function(event) {
  event.preventDefault();
  $.Velocity.RunSequence(actionOpen);
});

$(".ad_js-actionClose").on('click', function(event) {
  event.preventDefault();
  $.Velocity.RunSequence(actionClose);
});





$('.ad_actionBtn').click(function(e){
    e.preventDefault();	
		$('#js_actionDrawer__content').load($(this).prop("href")); 
});

















