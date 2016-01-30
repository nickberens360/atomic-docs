var $comp = $('.component');

$comp.wrapInner( '<div class="source"></div>');

//$('#home').wrap( "<div class='atoms-group'></div>" );

$('.markup-display').append( '<div class="atoms-code-example"><pre><code class="dest language-markup"></code></pre></div>' );
	
var ls = $('.compWrap');


ls.each(function() {
	
var source =	$(this).find('.source').html();
var dest = 		$(this).find('.dest')

dest.text(source);

});	