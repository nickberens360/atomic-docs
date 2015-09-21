$( ".atomic-link-show" ).click(function() {
  $(this).parent().next().slideToggle();
	$(this).toggleClass('rotate');
});

$(document).ready(function() {
    var pathname = window.location.href.split('#')[0];
    $('.atoms-sub-menu a[href^="#"]').each(function() {
        var $this = $(this),
            link = $this.attr('href');
        $this.attr('href', pathname + link);
    });
});

