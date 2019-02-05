<!--<div class="atomic-compWrap" data-atomiccomponent="box" data-atomiccat="modules">


    <?php /*include 'components/molecules/atomic-compBar.php'*/?>
    <?php /*include 'components/molecules/atomic-compDescription.php'*/?>





    <div class="atomic-component__component">
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
						<?php /*$markup_file_content = file_get_contents('includes/titleBar.php', true); */?>
                        <div class="atomic-editor" id="atomic-editor-markup"><?/*= htmlspecialchars($markup_file_content, ENT_QUOTES); */?></div>

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
						<?php /*$style_file_content = file_get_contents('scss/siteColors/_colors.scss', true); */?>
                        <div class="atomic-editor" id="atomic-editor-styles"><?/*= $style_file_content; */?>
                        </div>
                    </div>
                    <textarea id="atomic-copy-target-styles" class="atomic-copy-target"></textarea>
                </form>
            </div>

        </div>


    </div>


</div>





-->