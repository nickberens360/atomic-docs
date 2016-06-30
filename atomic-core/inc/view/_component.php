<?php
global $Atomic;
$FllatComponent = new FllatComponent();
$component = Atomic::receive('component');
$componentDB = $FllatComponent->where('component', $component, false);
$componentDB = $componentDB[0];

$content = Atomic::receive('content');
$category = Atomic::receive('category');

//var_dump($componentDB, $componentDB['description']);
?>
<div class="compWrap">
	<span id="<?= $component; ?>" class="compTitle atomic-editable"><?= $component; ?> <span class="js-hideAll fa fa-eye"></span></span>
	<p class="compNotes atomic-editable"><?= $componentDB['description']; ?></p>
	<div class="component" style="background-color: <?= $componentDB['backgroundColor']; ?>">
		<?= $content['markup']; ?>
	</div>
	<div class="compCodeBox">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#<?= $component; ?>-markup" aria-controls="box-markup" role="tab" data-toggle="tab">Markup</a>
			</li>
			<li role="presentation">
				<a href="#<?= $component; ?>-css" aria-controls="box-css" role="tab" data-toggle="tab">scss</a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active markup-display" id="<?= $component; ?>-markup">
				<form class="atomic-editorWrap">
					<div class="atomic-editorInner">
						<div class="atoms-code-example">
							<div class="atomic-editor ace_editor ace-tm" id="editor-markup-<?= $component; ?>">
								<pre><code class="language-markup"><?= htmlentities($content['markup']); ?></code></pre>
								<input type="hidden" name="new-styles-val" value=""/>
							</div>
						</div>
					</div>
					<div class="atomic-editor-footer">
						<button type="submit" class="atomic-btns atomic-btn1">Save</button>
						<span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane" id="<?= $component; ?>-css">
				<form class="atomic-editorWrap">
					<div class="atomic-editorInner">
						<div class="atoms-code-example">
							<div class="atomic-editor ace_editor ace-tm" id="editor-style-<?= $component; ?>">
								<pre><code class="language-css"><?= $content['scss']; ?></code></pre>
								<input type="hidden" name="new-styles-val" value=""/>
							</div>
						</div>
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