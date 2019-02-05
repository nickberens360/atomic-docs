<!-- components/organisms/atomic-compWrap.php -->

<div class="atomic-compWrap" data-atomiccomponent="box" data-atomiccat="modules">
    <div class="atomic-compBar">
        <div class="atomic-compBarLeft">
            <h2 class="atomic-component__title">componentTitle
                <span class="atomic-component__actions">
				<a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-window-maximize js-atomic-fullscreen-trigger" aria-hidden="true"></i></a>
			</span>
            </h2>
        </div>
        <div class="atomic-compBarRight">
            <div class="atomic-dashControls">
                <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="100%"><i class="fa fa-desktop" aria-hidden="true"></i></a></li>
                <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="768px"><i class="fa fa-tablet" aria-hidden="true"></i></a></li>
                <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="375px"><i class="fa fa-mobile" aria-hidden="true"></i></a></li>
            </div>
        </div>
    </div>
    <p class="atomic-compDescription">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque debitis facere, inventore ipsa molestiae placeat? Ab animi aspernatur commodi dolor ea facere itaque laborum, non odio pariatur possimus quasi quod?</p>
	<div class="atomic-component">
        <div class="box">Box</div>
        <div class="win-size-grip"></div>
    </div>
    <div class="atomic-tabs">
        <ul class="tabs atomic-tabs__tabs">
            <li class="atomic-tabs__item atomic-tabs__current" data-tab="atomic-markup-tab"><i class="fa fa-code" aria-hidden="true"></i> Markup</li>
            <li class="atomic-tabs__item" data-tab="atomic-output-tab"><i class="fa fa-eye" aria-hidden="true"></i> Output</li>
            <li class="atomic-tabs__item" data-tab="atomic-styles-tab"><i class="fa fa-css3" aria-hidden="true"></i> Styles</li>
            <li class="atomic-tabs__copy">
                <button class="atomic-copyBtn atomic-markup-copyBtn" data-clipboard-target="#atomic-copy-target-markup">
                    <i class="fa fa-clone" aria-hidden="true"></i> Copy Markup
                </button>
                <button class="atomic-copyBtn  atomic-styles-copyBtn" data-clipboard-target="#atomic-copy-target-styles">
                    <i class="fa fa-clone" aria-hidden="true"></i> Copy Styles
                </button>
            </li>
        </ul>

        <div class="atomic-tabs__main">
            <div id="atomic-markup-tab" class="atomic-tabs__content atomic-tabs__current">
                <form class="atomic-editor__wrap">
                    <div class="atomic-editor__inner">
						<?php $markup_file_content = file_get_contents(ATOMIC_MISC . '/box.php', true); ?>
                        <div class="atomic-editor" id="atomic-editor-markup"><?= htmlspecialchars($markup_file_content, ENT_QUOTES); ?></div>

                    </div>
                    <textarea id="atomic-copy-target-markup" class="atomic-copy-target"></textarea>
                </form>
            </div>
            <div id="atomic-output-tab" class="atomic-tabs__content">
                Output Tab
            </div>


            <div id="atomic-styles-tab" class="atomic-tabs__content">
                <form class="atomic-editor__wrap">
                    <div class="atomic-editor__inner">
						<?php $style_file_content = file_get_contents('scss/misc/_box.scss', true); ?>
                        <div class="atomic-editor" id="atomic-editor-styles"><?= $style_file_content; ?>
                        </div>
                    </div>
                    <textarea id="atomic-copy-target-styles" class="atomic-copy-target"></textarea>
                </form>
            </div>

        </div>




        <div class="atomic-editorFooter">
            <button type="submit" class="atomic-btn-icon"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
            <span type="reset" class="atomic-btn-icon js-atomic-editorFooter__cancel"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</span>
        </div>

    </div>
</div>





