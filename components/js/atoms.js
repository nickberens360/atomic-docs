var $comp = $('.component');

$comp.wrapInner( '<div class="source"></div>');

$('.source').wrap( "<div class='atoms-group'></div>" );

$('.atoms-group').append( '<div class="atoms-code-example"><pre><code class="dest language-markup"></code></pre></div>' );
	
var ls = $('.atoms-group');

ls.each(function() {
	
var source =	$(this).find('.source').html();
var dest = 		$(this).find('.dest')

dest.text(source);

});	



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


function controllPanel(){
	var $side = $('.atoms-side');
	var $sideNav = $('.atoms-side').find('nav');
	var $panelBtn = $( ".atoms-panel_show" );
	var $hideBtn = $( ".atoms-side_hide");
	
	$side.css('width', '100%');
	$sideNav.css('display', 'none');
	$panelBtn.css('display', 'none');
	$hideBtn.css('display', 'none');
}



$( ".atoms-panel_show" ).click(function() {
	controllPanel()
});




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




 
	


