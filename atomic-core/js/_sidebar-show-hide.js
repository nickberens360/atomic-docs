function sidebar(){
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
	
$('.atoms-main').css('padding-left',sideBarWidth+20);










 
	


