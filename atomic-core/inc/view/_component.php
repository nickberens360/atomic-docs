<?php
global $Atomic;
$FllatComponent = new FllatComponent();
$component = Atomic::receive('component');
$componentDB = $FllatComponent->where('component', $component, false);
$componentDB = $componentDB[0];

$content = Atomic::receive('content');
$category = Atomic::receive('category');

?>


<div id="<?= $component; ?>-container" class="compWrap"><span id="<?= $component; ?>" class="compTitle" ><span contenteditable="true"><?= $component; ?></span> <span class="js-hideAll fa fa-eye"></span></span>

	<p class="compNotes"><span contenteditable="true"><?= $componentDB['description'] ?></span></p>
	<div class="component" style="background-color:<?= $backgroundColor; ?>">
		<?= $content['markup'] ?>
	</div>


	<div>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#<?= $component; ?>-markup-tab" aria-controls="home" role="tab" data-toggle="tab">Markup</a></li>
			<li role="presentation"><a href="#<?= $component; ?>-styles-tab" aria-controls="profile" role="tab" data-toggle="tab">Styles</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="<?= $component; ?>-markup-tab"">
			<form class="atomic-editorWrap">
				<div class="atomic-editorInner">
					<div class="copyBtn copyBtn-markup" data-clipboard-text="">Copy</div>
					<div class="atomic-editor" id="editor-markup-<?= $component; ?>"><?php echo htmlspecialchars($content['markup'], ENT_QUOTES); ?></div>
					<input class="new-val-input" type="hidden" name="new-markup-val" value="" />
				</div>
				<div class="atomic-editor-footer">
					<button type="submit" class="atomic-btns atomic-btn1">Save</button>
					<span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span>
				</div>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="<?= $component; ?>-styles-tab">
			<form class="atomic-editorWrap">
				<div class="atomic-editorInner">
					<div class="copyBtn copyBtn-styles" data-clipboard-text="">Copy</div>
					<div class="atomic-editor" id="editor-styles-<?= $component; ?>"><?php echo htmlspecialchars($content['scss'], ENT_QUOTES); ?></div>
					<input type="hidden" name="new-styles-val" value="" />
				</div>
				<div class="atomic-editor-footer">
					<button type="submit" class="atomic-btns atomic-btn1">Save</button>
					<span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span>
				</div>
			</form>
		</div>
	</div>
</div>
</div>





<script>

	var editor = ace.edit("editor-markup-<?= $component; ?>");
	var code = editor.getValue();


	var code = code.replace(/<!--(.*?)-->/g, '');
	var code = code.trim();

	$('#<?= $component; ?>-container').find(".copyBtn-markup").attr('data-clipboard-text', code);
	new ZeroClipboard($('.copyBtn-markup'));

	editor.getSession().setMode("ace/mode/html");
	editor.setOptions({
		maxLines: Infinity
	});
	editor.setHighlightActiveLine(false);
	editor.setShowPrintMargin(false);
</script>
<script>
	var editor = ace.edit("editor-styles-<?= $component; ?>");
	var code = editor.getValue();

	var code = code.replace(/\/\*(.*?)\*\//g, '');
	var code = code.trim();

	$('#<?= $component; ?>-container').find(".copyBtn-styles").attr('data-clipboard-text', code);
	new ZeroClipboard($('.copyBtn-styles'));

	editor.getSession().setMode("ace/mode/scss");
	editor.setOptions({
		maxLines: Infinity
	});
	editor.setHighlightActiveLine(false);
	editor.setShowPrintMargin(false);
</script>