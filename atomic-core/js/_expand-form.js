
$( window ).resize(function() {
    sideHeight = $('.atoms-side').outerHeight();

    formHeight = $('.cat-form-group').outerHeight();

    oflowHeight = sideHeight - formHeight;

    console.log(oflowHeight);

    $('.atoms-overflow').css('height',oflowHeight);

});



sideHeight = $('.atoms-side').outerHeight();

formHeight = $('.cat-form-group').outerHeight();

oflowHeight = sideHeight - formHeight;



$('.atoms-overflow').css('height',oflowHeight);


$('.cat-form-group .fa').click(function() {	
	$(this).toggleClass('fa-minus-square-o fa-plus-square-o');

	$('.js-showContent').slideToggle();

});





$( ".atomic-link-grp .atomic-link-show" ).click(function() {
  $(this).parent().next().slideToggle();
    $(this).toggleClass('fa-folder-o fa-folder-open-o ');
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













