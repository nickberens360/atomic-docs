
/*$( window ).resize(function() {
    sideHeight = $('.auto-side').outerHeight();

    formHeight = $('.cat-form-group').outerHeight();

    oflowHeight = sideHeight - formHeight;

    console.log(oflowHeight);

    $('.auto-overflow').css('height',oflowHeight);

});



sideHeight = $('.auto-side').outerHeight();

formHeight = $('.cat-form-group').outerHeight();

oflowHeight = sideHeight - formHeight;



$('.auto-overflow').css('height',oflowHeight);*/


$('.cat-form-group .fa').click(function() {	
	$(this).toggleClass('fa-minus-square-o fa-plus-square-o');

	$('.js-showContent').slideToggle();

});





$( ".ad_dir__dirNameGroup .ad_dir__dirNameGroup__icon" ).click(function() {
  $(this).parent().next().slideToggle('fast');
    $(this).toggleClass('fa-folder-o fa-folder-open-o ');
});




$('.active .ad_dir__dirNameGroup__icon').removeClass('fa-folder-o').addClass('fa-folder-open-o');


$(document).ready(function() {
    var pathname = window.location.href.split('#')[0];
    $('.ad_fileSection a[href^="#"]').each(function() {
        var $this = $(this),
            link = $this.attr('href');
        $this.attr('href', pathname + link);
    });
});













