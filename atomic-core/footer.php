


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="atomic-core/js/src-min/ace.js"></script>
<script src="atomic-core/zero/ZeroClipboard.js"></script>


<?php
$cat = $_GET['cat'];
global $cat;
$comp_data = array_filter($comp_data, function($v) {
    global $cat;
    return $v['comp_category'] == $cat;});
usort($comp_data , function($a, $b) {
    return $a['comp_sort_order'] - $b['comp_sort_order'];
});
foreach ($comp_data as $comp_value) {
?>




<script>

	var editor = ace.edit("editor-markup-<?php echo $comp_value['comp_name'] ?>");
	var code = editor.getValue();


	var code = code.replace(/<!--(.*?)-->/g, '');
	var code = code.trim();

	$('#<?php echo $comp_value['comp_name'] ?>-container').find(".copyBtn-markup").attr('data-clipboard-text', code);
	new ZeroClipboard($('.copyBtn-markup'));

	editor.getSession().setMode("ace/mode/html");
	editor.setOptions({
		maxLines: Infinity
	});
	editor.setHighlightActiveLine(false);
	editor.setShowPrintMargin(false);
</script>
	<script>
		var editor = ace.edit("editor-styles-<?php echo $comp_value['comp_name'] ?>");
		var code = editor.getValue();

		var code = code.replace(/\/\*(.*?)\*\//g, '');
		var code = code.trim();

		$('#<?php echo $comp_value['comp_name'] ?>-container').find(".copyBtn-styles").attr('data-clipboard-text', code);
		new ZeroClipboard($('.copyBtn-styles'));

		editor.getSession().setMode("ace/mode/scss");
		editor.setOptions({
			maxLines: Infinity
		});
		editor.setHighlightActiveLine(false);
		editor.setShowPrintMargin(false);
	</script>
<?php } ?>

<script src="atomic-core/js/min/compiled.min.js"></script>

<?php
			$filename = '../atomic-foot.php';
			if (file_exists($filename)) {
			    include ("../atomic-foot.php");
			}
		?>



    </body>
</html>
