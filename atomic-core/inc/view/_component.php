<?php
global $Atomic;
$content = Atomic::receive('content');
$component = Atomic::receive('component');
$category = Atomic::receive('category');
?>
<div class="compWrap">
	<span id="<?= $component; ?>" class="compTitle"><?= $component; ?> <span class="js-hideAll fa fa-eye"></span></span>
	<p class="compNotes">This is the <?= $component; ?> component. It serves as an example. You can edit the Scss for
		this
		component in scss/<?= $category; ?>/_<?= $component; ?>.scss. You can edit the markup for this component in
		components/modules/<?= $component; ?>.php. Make sure your preprocessor is set up to process scss/main.scss to
		css/main!</p>
	<div class="component" style="background-color:">
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
				<div class="atoms-code-example">
					<pre><code class="language-markup"><?= htmlentities($content['markup']); ?></code></pre>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="<?= $component; ?>-css">
				<pre><code class="language-css"><?= $content['scss']; ?></code></pre>
			</div>
		</div>
	</div>
</div>