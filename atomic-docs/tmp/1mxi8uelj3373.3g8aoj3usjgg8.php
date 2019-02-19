<div id="<?= ($comp->slug()) ?>" class="atomic-compWrap" data-id="<?= ($comp->componentId()) ?>" data-js="<?= ($comp->hasJs()) ?>">

	<form action="<?= (baseAlias('editComponentSource', ['compId' => $comp->componentId()])) ?>" class="ajax-form" method="post">

		<input type="hidden" name="action" value="srcEdit">

		<div class="atomic-compBar">
			<div class="atomic-compBarLeft">

				<h2 class="atomic-component__title">
					<a href="<?= (baseAlias('componentSingle', ['compId' => $comp->componentId()])) ?>" title="Single View" target="_blank"><?= ($comp->name()) ?></a>
				</h2>

				<div class="atomic-hidden atomic-inline-block">
					<input type="hidden" name="action" value="srcEdit">
					<a href="<?= (baseAlias('deleteComponent', ['compId' => $comp->componentId()])) ?>" class="material-icons ajax-link delete-comp" data-action="delete-component" onclick="return confirm('Delete Component?');">delete</a>
					<div class="atomic-inline-block">
						<input class="atomic-comp-edit-title" type="text" name="atomic-component-name" value="<?= ($comp->name()) ?>">

						<select class="atomic-input-alt u-mlx1" name="" id="">
							<option value="">Move to Category</option>
							<option value="">Item</option>
							<option value="">Item</option>
							<option value="">Item</option>
							<option value="">Item</option>
							<option value="">Item</option>
							<option value="">Item</option>
						</select>

						<input class="atomic-colorPicker" type="text" name="atomic-bgColor" value="<?= ($comp->backgroundColor()) ?>">

						<?php if ($comp->hasJs() != 1): ?>
							<label class="atomic-compBar__label"><input class="atomic-js-input" type="checkbox" name="atomic-add-js"> Add JS File</label>
						<?php endif; ?>

						<button type="submit" class="btnSimple">save</button>
						<button type="reset" class="btnSimple-alt btnSimple js-atomic-inline-cancel">cancel</button>
					</div>

				</div>

				<div class="atomic-component__actions">

					<a href="#" class="material-icons js-inline-trigger">chevron_right</a>

					<?php if ($isSingle == false): ?>
						<a href="<?= (baseAlias('componentSingle', ['compId' => $comp->componentId()])) ?>" title="Single View"><i class="material-icons">exit_to_app</i></a>
					<?php endif; ?>

				</div>

			</div>
			<div class="atomic-compBarRight">
				<div class="atomic-dashControls">
					<li>
						<span class="atomic-dimLabel">W:</span>
						<input class="atomic-compDim-val js-atomic-compWidth-val" type="text" value="100%">
						<span class="atomic-dimDivider">x</span>
						<span class="atomic-dimLabel">H:</span>
						<input class="atomic-compDim-val js-atomic-compHeight-val" type="text" value="auto">
					</li>
					<li>
						<a href="#" class="js-atomic-dashControl" data-atomicwidth="100%"><i class="fa fa-desktop" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="#" class="js-atomic-dashControl" data-atomicwidth="768px"><i class="fa fa-tablet" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="#" class="js-atomic-dashControl" data-atomicwidth="375px"><i class="fa fa-mobile" aria-hidden="true"></i></a>
					</li>
				</div>
			</div>
		</div>

		<?php if ($comp->backgroundColor()): ?>

		<div class="atomic-component js-atomic-component atomic-component-bg" style="background-color: <?= ($comp->backgroundColor()) ?>">

			<?php else: ?>
			<div class="atomic-component js-atomic-component">

				<?php endif; ?>

				<div class="atomic-placeholder" data-src="<?= (baseAlias('viewComponent', ['component' => $comp->componentId()])) ?>" data-class="partial-viewport component-<?= ($comp->slug()) ?>">
					Loading...
				</div>

				<div class="win-size-grip"></div>
			</div>

			<div class="atomic-tabs">
				<ul class="tabs atomic-tabs__tabs">
					<li class="atomic-tabs__item atomic-tabs__current" data-tab="atomic-markup-tab">
						<i class="fa fa-code" aria-hidden="true"></i> Markup
					</li>
					<li class="atomic-tabs__item" data-tab="atomic-output-tab">
						<i class="fa fa-eye" aria-hidden="true"></i> Output
					</li>
					<li class="atomic-tabs__item" data-tab="atomic-styles-tab">
						<i class="fa fa-css3" aria-hidden="true"></i> Styles
					</li>

					<?php if ($comp->hasJs()): ?>
						<li class="atomic-tabs__item" data-tab="atomic-js-tab">{ } javascript</li>
					<?php endif; ?>

					<li class="atomic-tabs__item" data-tab="atomic-notes-tab">
						<i class="fa fa-comment" aria-hidden="true"></i> Notes
					</li>

					<li class="atomic-tabs__copy">
						<button class="atomic-copyBtn atomic-markup-copyBtn" data-clipboard-target="#atomic-copy-target-markup-<?= ($comp->componentId()) ?>">
							<i class="fa fa-clone" aria-hidden="true"></i> Copy Markup
						</button>
						<button class="atomic-copyBtn  atomic-styles-copyBtn" data-clipboard-target="#atomic-copy-target-styles-<?= ($comp->componentId()) ?>">
							<i class="fa fa-clone" aria-hidden="true"></i> Copy Styles
						</button>
						<?php if ($comp->hasJs()): ?>
							<button class="atomic-copyBtn  atomic-js-copyBtn" data-clipboard-target="#atomic-copy-target-js-<?= ($comp->componentId()) ?>">
								<i class="fa fa-clone" aria-hidden="true"></i> Copy Javascript
							</button>
						<?php endif; ?>
					</li>
				</ul>

				<div class="atomic-editorForm">
					<div class="atomic-tabs__main">
						<div id="atomic-markup-tab" class="atomic-tabs__content atomic-tabs__current">
							<div class="atomic-editor__wrap">
								<div class="atomic-editor__inner">

									<div class="atomic-editor" id="atomic-editor-markup-<?= ($comp->componentId()) ?>">
										<textarea><?= (incFilter($comp->compFile($comp, 'markup'))) ?></textarea></div>

								</div>
								<textarea name="atomic-markup-field" id="atomic-copy-target-markup-<?= ($comp->componentId()) ?>" class="atomic-copy-target"><?= (incFilter($comp->compFile($comp, 'markup'))) ?></textarea>
							</div>
						</div>

						<div id="atomic-output-tab" class="atomic-tabs__content">

						</div>

						<div id="atomic-styles-tab" class="atomic-tabs__content">
							<div class="atomic-editor__wrap">
								<div class="atomic-editor__inner">

									<div class="atomic-editor" id="atomic-editor-styles-<?= ($comp->componentId()) ?>">
										<textarea><?= (incFilter($comp->compFile($comp, 'styles'))) ?></textarea></div>
								</div>
								<textarea name="atomic-styles-field" id="atomic-copy-target-styles-<?= ($comp->componentId()) ?>" class="atomic-copy-target"><?= (incFilter($comp->compFile($comp, 'styles'))) ?></textarea>
							</div>
						</div>

						<?php if ($comp->hasJs()): ?>
							<div id="atomic-js-tab" class="atomic-tabs__content">
								<div class="atomic-editor__wrap">
									<div class="atomic-editor__inner">

										<div class="atomic-editor" id="atomic-editor-js-<?= ($comp->componentId()) ?>">
											<textarea><?= (incFilter($comp->compFile($comp, 'js'))) ?></textarea></div>
									</div>
									<textarea name="atomic-js-field" id="atomic-copy-target-js-<?= ($comp->componentId()) ?>" class="atomic-copy-target"><?= (incFilter($comp->compFile($comp, 'js'))) ?></textarea>
								</div>
							</div>
						<?php endif; ?>

						<div id="atomic-notes-tab" class="atomic-tabs__content">
							<div class="atomic-editor__wrap">
								<div class="atomic-editor__inner atomic-editor__inner-note">
									<textarea class="summernote" name="atomic-description-field"><?= ($comp->description()) ?></textarea>
								</div>

							</div>
						</div>

					</div>

					<!--<div class="atomic-editorFooter">
						<button type="submit" class="atomic-btn-icon"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
						<span type="reset" class="atomic-btn-icon js-atomic-editorFooter__cancel"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</span>
					</div>-->

				</div>

			</div>

	</form>

</div>
