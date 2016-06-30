<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="atomic-core/js/src-min/ace.js"></script>

<!-- <php $file = file_get_contents('../components/modules/box.php', FILE_USE_INCLUDE_PATH);
ehco $file;
echo "testing";
?> -->


<script>
	$(document).ready(function () {

		$('body').on('click', '.atomic-editor', function () {
			$('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
			$(this).closest('.atomic-editorWrap').addClass('atomic-editorWrap-active');
		});
		$('body').on('click', '.js-close-editor', function () {
			$('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
		});


		$('body').on('click', '.ace_editor', function () {
			var editor = ace.edit($(this).attr('id'));
			var code = editor.getValue();
//			console.log(code);
			editor.getSession().setMode("ace/mode/html");
			editor.setOptions({
				maxLines: Infinity
			});
			editor.setHighlightActiveLine(false);
			editor.setShowPrintMargin(false);
		});
	});

	$(document).on('mouseup', 'body', function (e) {
		var container = $('.atomic-editorWrap');
		if (!container.is(e.target) // if the target of the click isn't the container...
			&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			container.removeClass('atomic-editorWrap-active');
		}
	});
</script>


<script src="atomic-core/js/min/compiled.min.js"></script>

<?php
$filename = '../atomic-foot.php';
if (file_exists($filename)) {
	include("../atomic-foot.php");
}
?>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>-->
<script src="atomic-core/zero/ZeroClipboard.js"></script>


</body>
</html>