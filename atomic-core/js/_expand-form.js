$( ".atomic-link-grp .atomic-link-show" ).click(function() {
  $(this).parent().next().slideToggle();
	$(this).toggleClass('fa-folder-o fa-folder-open-o ');
});


$('.cat-form-group .fa').click(function() {	
	$(this).toggleClass('fa-minus-square-o fa-plus-square-o');
		//$(this).css('color','red');

	$('.js-showContent').slideToggle();
});



$('.active .atomic-link-show').removeClass('fa-folder-o').addClass('fa-folder-open-o');


$(document).ready(function() {
    var pathname = window.location.href.split('#')[0];
    $('.atoms-sub-menu a[href^="#"]').each(function() {
        var $this = $(this),
            link = $this.attr('href');
        $this.attr('href', pathname + link);
    });
});

