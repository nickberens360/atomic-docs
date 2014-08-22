function sidebar(){
	var $side = $('.atoms-side');
	var $main = $('.atoms-main');
	var sideWidth = $side.width();
	var $showBtn = $('.atoms-side_show');
	
	$showBtn.css('left', '-100px');
	$side.css('left', '0');
	$main.css('padding-left', sideWidth + 20);
}

function noSidebar(){
	var $side = $('.atoms-side');
	var $main = $('.atoms-main');
	var $showBtn = $('.atoms-side_show');
	
	$showBtn.css('left', '0');
	$side.css('left', '-500px');
	$main.css('padding-left', '20px');
}


$( document ).ready(function() {
	if($('.atoms-side').is(':visible')){
		sidebar()
	}
  	
});
$( window ).resize(function() {
	if($('.atoms-side').is(':visible')){
		sidebar()
	}
});

$( ".atoms-side_hide" ).click(function() {
	noSidebar()
});

$( ".atoms-side_show" ).click(function() {
	sidebar()
});




 
	


