<?php include("head.php"); ?>
<?php
/*$json = file_get_contents('db/data.json');
$data = json_decode($json, true);*/

require "fllat.php";
$components = new Fllat("components");
$categories = new Fllat("categories");


$components = $components->select(array());
$categories = $categories->select(array());


?>
<body class="atoms">



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


                    <?php

                    usort($categories , function($a, $b) {
                        return $a['order'] - $b['order'];
                    });
                    foreach ($categories as $category) {
                        global $category
                        ?>




                        <li class="aa_dir <?php if ($category['category'] == $_GET['cat']) { ?>active<?php } ?>" data-navitem="<?php echo $category['category'] ?>">
                            <div class="aa_dir__dirNameGroup">
                                <i class="aa_dir__dirNameGroup__icon  fa fa-folder-o"></i>
                                <a class="aa_dir__dirNameGroup__name"
                                   data-cat="<?php echo $category['category'] ?>"
                                   href="atomic-core/?cat=<?php echo $category['category'] ?>"><?php echo $category['category'] ?></a>
                            </div>
                            <ul class="aa_fileSection fileSection-<?php echo $category['category'] ?>">
                                <li class="aa_addFileItem">
                                    <a class="aa_addFile js_add-component aa_js-actionOpen aa_actionBtn"
                                       href="atomic-core/temp-forms/temp-create-component-form.php"
                                       data-cat="<?php echo $category['category'] ?>">
                                        <span class="fa fa-plus"></span> Add Component</a>
                                </li>


                                <?php

                                $filtered = array_filter($components, function($v) {
                                    global $category;
                                    return $v['category'] == $category['category'];
                                });
                                usort($filtered , function($a, $b) {
                                    return $a['order'] - $b['order'];
                                });
                                ?>
                                <?php foreach ($filtered as $component) { ?>

                                    <li class="aa_fileSection__file" data-comp="<?php echo $component['component'] ?>" data-cat="<?php echo $category['category'] ?>">
                                        <a href="atomic-core/?cat=<?php echo $category['category'] ?>#<?php echo $component['component'] ?>"><?php echo $component['component'] ?></a>
                                    </li>


                                <?php } ?>

                            </ul>
                        </li>


                    <?php } ?>





                </ul>
                <div class="catAdd"><a class="js_cat-add aa_js-actionOpen aa_actionBtn"
                                       href="atomic-core/temp-forms/temp-category-form.php"><span
                            class="fa fa-plus"></span> Add Category</a></div>
            </nav>


        </div>

        <div class="cat-form js-showContent"></div>


    </aside>


    <div class="atoms-main">


        <?php if (!empty($_GET['cat'])) { ?>




        <h1 id="modules" class="atomic-h1"><?php echo $_GET['cat']; ?> <a class="fa fa fa-pencil-square-o js_cat-edit aa_js-actionOpen aa_actionBtn" href="atomic-core/temp-forms/temp-edit-category-form.php" data-cat="<?php echo $_GET['cat']; ?>">

            </a></h1>


        <?php
        $cat = $_GET['cat'];
        global $cat;
        $components = array_filter($components, function($v) {
            global $cat;
            return $v['category'] == $cat;});
        usort($components , function($a, $b) {
            return $a['order'] - $b['order'];
        });
        foreach ($components as $component) {
        ?>




        <div id="<?php echo $component['component'] ?>-container" class="compWrap">
            <p id="<?php echo $component['component'] ?>"
               class="content-editable compTitle">
                <span><?php echo $component['component'] ?></span>&nbsp;
                <span class="js-hideAll fa fa-eye"></span>&nbsp;
                <a class="fa fa fa-pencil-square-o js_edit-component aa_js-actionOpen aa_actionBtn"
                   href="atomic-core/temp-forms/temp-edit-component-form.php"
                   data-cat="<?php echo $cat; ?>" data-comp="<?php echo $component['component'] ?>">

                </a>






            </p>

            <p class="compNotes" data-description="<?php echo $component['description'] ?>"><?php echo $component['description'] ?></p>

            <div class="component <?php if ($component['backgroundColor']) { ?>componentHasBg<?php } ?>"
                 data-color="<?php echo $component['backgroundColor'] ?>"
                 style="background-color:<?php echo $component['backgroundColor'] ?>">


                <iframe class="partial-viewport"
                        src="atomic-core/partial.php?component=<?php echo $component['component'] ?>&category=<?php echo $cat; ?>"
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
                          data-editorFormCat="<?php echo $cat; ?>" data-codeDest="components">
                        <div class="atomic-editorInner">
                            <div class="copyBtn copyBtn-markup" data-clipboard-text="">Copy</div>

                            <?php $markup_file_content = file_get_contents('../components/' . $cat . '/' . $component['component'] . '.php', true); ?>
                            <div class="atomic-editor"
                                 id="editor-markup-<?php echo $component['component'] ?>"><?= htmlspecialchars($markup_file_content, ENT_QUOTES); ?></div>

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
                          data-editorFormCat="<?php echo $cat; ?>" data-codeDest="scss">
                        <div class="atomic-editorInner">
                            <div class="copyBtn copyBtn-styles" data-clipboard-text="">Copy</div>


                            <?php $style_file_content = file_get_contents('../scss/' . $cat . '/_' . $component['component'] . '.scss', true); ?>

                            <div class="atomic-editor"
                                 id="editor-styles-<?php echo $component['component'] ?>"><?= htmlspecialchars($style_file_content, ENT_QUOTES); ?></div>

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



        <?php } ?>

        <?php } else { ?>
index
        <?php } ?>

    </div>




</div>
</div>


<div class="aa_js-actionDrawer aa_actionDrawer">
    <div class="aa_actionDrawer__wrap">
        <div class="aa_js-actionClose aa_actionDrawer__close"><i class="fa fa-times fa-3x"></i></div>
        <div id="js_actionDrawer__content" class="actionDrawer__content">


        </div>
    </div>
</div>


<?php include("footer.php"); ?>


