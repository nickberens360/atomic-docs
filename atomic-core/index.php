<?php include("head.php"); ?>
<?php
$json = file_get_contents('db/data.json');
$data = json_decode($json, true);
/*require "fllat.php";
$compdb = new Fllat("compdb");
$catdb = new Fllat("catdb");


$comp_data = $compdb->select(array());
$cat_data = $catdb->select(array());*/


/*$json = file_get_contents('db/data.json');

$data = json_decode($json, true);

foreach ($data as $data_value) {
    echo $data_value['category'].'<br/>';

    foreach ($data as $data_value) {
        echo $data_value['category'].'<br/>';
    }
}*/


?>
<body class="atoms">
<script language="javascript" type="text/javascript">
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
</script>


<div class="grid-row atoms-container">
    <div class="atoms-side_show-small ">
        <span class="toggle-line"></span>
        <span class="toggle-line"></span>
        <span class="toggle-line"></span>
    </div>
    <div class="atoms-side_show ">
        <span class="js-showSide fa fa-arrow-right"></span>
    </div>
    <aside class="atoms-side">
        <div class="atoms-overflow">

            <div class="atoms-side_hide">
                <span class="js-hideSide fa fa-arrow-left"></span>
                <span class="js-hideTitle fa fa-header"></span>
                <span class="js-hideNotes fa fa-paragraph"></span>
                <span class="js-hideCode fa fa-code"></span>
            </div>

            <nav>
                <ul class="atoms-nav">





                    <?php foreach ($data as $data_value) {


                        ?>

                        <li class="aa_dir ">
                            <div class="aa_dir__dirNameGroup">
                                <i class="aa_dir__dirNameGroup__icon  fa fa-folder-o"></i>
                                <a class="aa_dir__dirNameGroup__name"
                                   href="atomic-core/?cat=<?php echo $data_value['category'] ?>"><?php echo $data_value['category'] ?></a>
                            </div>
                            <ul class="aa_fileSection">
                                <li class="aa_addFileItem">
                                    <a class="aa_addFile aa_js-actionOpen aa_actionBtn"
                                       href="atomic-core/categories/modules/form-modules.php">
                                        <span class="fa fa-plus"></span> Add Component</a>
                                </li>


                                <?php foreach ($data_value['components'] as $component) { ?>

                                    <li class="aa_fileSection__file">
                                        <!--<a class="aa_js-actionOpen aa_actionBtn fa fa-pencil-square-o" href="atomic-core/categories/<?php /*echo $cat_value['cat_name'] */ ?>/form-<?php /*echo $comp_value['comp_name'] */ ?>.php"></a>-->
                                        <a href="atomic-core/?cat=<?php echo $data_value['category'] ?>#<?php echo $component['component'] ?>"><?php echo $component['component'] ?></a>

                                    </li>
                                <?php } ?>
                            </ul>
                        </li>


                    <?php } ?>


                    <li class="catAdd"><a class="aa_js-actionOpen aa_actionBtn"
                                          href="atomic-core/categories/_catActions.php"><span class="fa fa-plus"></span>
                            Add / Delete Category</a></li>


                </ul>

            </nav>


        </div>

        <div class="cat-form js-showContent"></div>


    </aside>


    <div class="atoms-main">
        <h1 id="modules" class="atomic-h1"><?php echo $_GET['cat']; ?></h1>


        <?php
            $cat = $_GET['cat'];
            global $cat;
            $data = array_filter($data, function($v) {
                global $cat;
                return $v['category'] == $cat;
            });
            foreach ($data as $data_value) {
            foreach ($data_value['components'] as $component) {
        ?>


        <div id="<?php echo $component['component'] ?>-container" class="compWrap">
            <p id="<?php echo $component['component'] ?>"
               class="content-editable compTitle"
               data-component="<?php echo $component['component'] ?>"
               data-category="<?php echo $data_value['category'] ?>"
               data-update-type="name"
               data-key="component"
               data-value="<?php echo $component['component'] ?>">
                <span contenteditable="true"><?php echo $component['component'] ?></span>
                <span class="js-hideAll fa fa-eye"></span>
            </p>

            <p class="compNotes"><span contenteditable="true"
                                       class="content-editable"
                                       data-component="<?php echo $component['component'] ?>"
                                       data-category="<?php echo $data_value['category'] ?>"
                                       data-update-type="description"
                                       data-key="description"
                                       data-value="<?= $component['description']; ?>"
                                       data-name="description"><?php echo $component['description'] ?></span></p>

            <div class="component" style="background-color:<?= $backgroundColor; ?>">





                <iframe class="partial-viewport"
                        src="atomic-core/partial.php?component=<?php echo $component['component'] ?>&category=<?php echo $data_value['category'] ?>"
                        sandbox="allow-same-origin allow-scripts  allow-modals" frameborder="0" scrolling="no"></iframe>


            </div>

            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#<?php echo $component['component'] ?>-markup-tab"
                                                              aria-controls="home" role="tab"
                                                              data-toggle="tab">Markup</a></li>
                    <li role="presentation"><a href="#<?php echo $component['component'] ?>-styles-tab"
                                               aria-controls="profile"
                                               role="tab" data-toggle="tab">Styles</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="<?php echo $component['component'] ?>-markup-tab"
                    ">
                    <form class="atomic-editorWrap" data-editorFormComp="<?php echo $component['component'] ?>"
                          data-editorFormCat="<?php echo $data_value['category'] ?>" data-codeDest="components">
                        <div class="atomic-editorInner">
                            <div class="copyBtn copyBtn-markup" data-clipboard-text="">Copy</div>

                            <?php $markup_file_content = file_get_contents('../components/'.$data_value['category'].'/'.$component['component'].'.php', true); ?>
                            <div class="atomic-editor" id="editor-markup-<?php echo $component['component'] ?>"><?= htmlspecialchars($markup_file_content, ENT_QUOTES); ?></div>

                            <input class="new-val-input" type="hidden"
                                   name="new-markup-val-<?php echo $component['component'] ?>"
                                   value=""/>
                        </div>
                        <div class="atomic-editor-footer">
                            <button type="submit" class="atomic-btns atomic-btn1">Save</button>
                            <span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="<?php echo $component['component'] ?>-styles-tab">
                    <form class="atomic-editorWrap" data-editorFormComp="<?php echo $component['component'] ?>"
                          data-editorFormCat="<?php echo $data_value['category'] ?>" data-codeDest="scss">
                        <div class="atomic-editorInner">
                            <div class="copyBtn copyBtn-styles" data-clipboard-text="">Copy</div>


                            <?php $style_file_content = file_get_contents('../scss/'.$data_value['category'].'/_'.$component['component'].'.scss', true); ?>

                            <div class="atomic-editor" id="editor-styles-<?php echo $component['component'] ?>"><?= htmlspecialchars($style_file_content, ENT_QUOTES); ?></div>

                            <input class="new-val-input" type="hidden"
                                   name="new-styles-val-<?php echo $component['component'] ?>" value=""/>
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


    <?php } ?>

    <?php } ?>


</div>
</div>
<div class="aa_js-actionDrawer aa_actionDrawer">
    <div class="aa_actionDrawer__wrap">
        <div class="aa_js-actionClose aa_actionDrawer__close"><i class="fa fa-times fa-3x"></i></div>
        <div id="js_actionDrawer__content" class="actionDrawer__content"></div>
    </div>
</div>
<?php include("footer.php"); ?>


<style>
/*    .atomic-form {
        background: #a6d4da;
        max-width: 500px;
        padding: 10px;
    }

    .textChange {
        width: 100%;
        border: none;
        font-size: 13px;
        color: #7A7A7A;
        margin-bottom: 0;
    }

    textarea.textChange {
        height: 200px;
        padding: 10px;
    }

    .atomic-form-input.textChange {
        padding: 10px;
    }

    .atomic-form-footer {
        text-align: right;
        padding-top: 5px;
    }

    .atomic-form-footer .atomic-btns {
        margin-right: 10px;
        display: inline-block;
    }
    */
</style>
