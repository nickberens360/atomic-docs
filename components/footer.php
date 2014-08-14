<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/min/site.min.js"></script>
<script src="js/prism.js"></script>
<script src="components/js/min/atoms.min.js"></script>

<script>
var $side = $('.atoms-side');
var $main = $('.atoms-main');
var sideWidth = $side.width();
$main.css('padding-left', sideWidth + 20);
$( window ).resize(function() {
	var $side = $('.atoms-side');
	var $main = $('.atoms-main');
	var sideWidth = $side.width();
  $main.css('padding-left', sideWidth + 20);
});
</script>
    </body>
</html>