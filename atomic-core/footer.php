


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="atomic-core/js/src-min/ace.js"></script>

<!-- <php $file = file_get_contents('../components/modules/box.php', FILE_USE_INCLUDE_PATH);
ehco $file;
echo "testing";
?> -->









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
	//console.log(code);
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
		//console.log(code);
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
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>-->
<script src="atomic-core/zero/ZeroClipboard.js"></script>



    </body>
</html>
