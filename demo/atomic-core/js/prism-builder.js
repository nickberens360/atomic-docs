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