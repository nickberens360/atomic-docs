$( ".atomic-link-show" ).click(function() {
  $(this).parent().next().slideToggle();
	$(this).toggleClass('rotate');
});