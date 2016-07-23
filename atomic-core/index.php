<?php include("head.php"); ?>
<?php
$json = file_get_contents('db/data.json');
$data = json_decode($json, true);


?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsviews/0.9.79/jsrender.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsviews/0.9.79/jsviews.min.js"></script>
<style>
    .atoms-side{
        color: #000 !important;
    }
</style>
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
                <ul id="result" class="atoms-nav"> </ul>
            </nav>

            <div class="catAdd"><a class="js_cat-add aa_js-actionOpen aa_actionBtn"
                                   href="atomic-core/temp-forms/temp-category-form.php"><span
                        class="fa fa-plus"></span> Add Category</a></div>

        </div>















        <script id="theTmpl" type="text/x-jsrender">
<div>



                    <li class="aa_dir ">
                        <div class="aa_dir__dirNameGroup">
                            <i class="aa_dir__dirNameGroup__icon  fa fa-folder-o"></i>
                            <a class="aa_dir__dirNameGroup__name"
                               data-cat="test"
                               href="atomic-core/?cat=test">{^{:category}}</a>
                        </div>
                        <ul class="aa_fileSection">
                            <li class="aa_addFileItem">
                                <a class="aa_addFile js_add-edit-component aa_js-actionOpen aa_actionBtn"
                                   href="atomic-core/temp-forms/temp-component-form.php"
                                   data-cat="test">
                                    <span class="fa fa-plus"></span> Add Component</a>
                            </li>

                         {^{for components}}
                            <li class="aa_fileSection__file" data-comp="test">
                                <a href="atomic-core/?cat=test#test">{^{:component}}</a>
                                <input type="text" data-link="component" value="stuff"/>
                            </li>
                          {{/for}}


                        </ul>
                    </li>




</div>
</script>



        <div class="cat-form js-showContent"></div>


    </aside>


    <div class="atoms-main">
        <h1 id="modules" class="atomic-h1"><a class="fa fa fa-pencil-square-o js_add-edit-component aa_js-actionOpen aa_actionBtn" href="atomic-core/temp-forms/temp-category-form.php">

            </a></h1>

        <div id="compContainer"></div>
        <script id="compTmpl" type="text/x-jsrender">
<div>

{^{for components}}
        <div id="box-container" class="compWrap">
            <p id="box"
               class="content-editable compTitle">
                <span>{^{:component}}</span>
                <span class="js-hideAll fa fa-eye"></span>&nbsp;
                <a class="fa fa fa-pencil-square-o js_add-edit-component aa_js-actionOpen aa_actionBtn"
                   href="atomic-core/temp-forms/temp-component-form.php"
                   data-cat="modules" data-comp="box">
                </a>
            </p>

            <p class="compNotes" data-description="Description example">Description example</p>

            <div class="component"
                 data-color="#eee"
                 style="background-color:#eee">


                <iframe class="partial-viewport"
                        src="atomic-core/partial.php?component=box&category=modules"
                        sandbox="allow-same-origin allow-scripts  allow-modals" frameborder="0" scrolling="no"></iframe>


            </div>

            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#box-markup-tab"
                                                              aria-controls="home" role="tab"
                                                              data-toggle="tab">Markup</a></li>
                    <li role="presentation"><a href="#box-styles-tab"
                                               aria-controls="profile"
                                               role="tab" data-toggle="tab">Styles</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="box-markup-tab"
                    ">
                    <form class="atomic-editorWrap" data-editorFormComp="box"
                          data-editorFormCat="modules" data-codeDest="components">
                        <div class="atomic-editorInner">
                            <div class="copyBtn copyBtn-markup" data-clipboard-text="">Copy</div>

                            <div class="atomic-editor"
                                 id="editor-markup-box"></div>
                            <input class="new-val-input" type="hidden"
                                   name="new-markup-val-box"
                                   value=""/>
                        </div>
                        <div class="atomic-editor-footer">
                            <button type="submit" class="atomic-btns atomic-btn1">Save</button>
                            <span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="box-styles-tab">
                    <form class="atomic-editorWrap" data-editorFormComp="box"
                          data-editorFormCat="<?php echo $data_value['category'] ?>" data-codeDest="scss">
                        <div class="atomic-editorInner">
                            <div class="copyBtn copyBtn-styles" data-clipboard-text="">Copy</div>

                            <div class="atomic-editor"
                                 id="editor-styles-box"></div>
                            <input class="new-val-input" type="hidden"
                                   name="new-styles-val-box" value=""/>
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

{{/for}}


</div>
</script>






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




<script>
    var data = [
        {
            "category": "modules",
            "components":[
                {"component":"box","description": "Box component description", "bgColor": ""},
                {"component":"list","description": "List component description", "bgColor": ""}
            ]
        },
        {
            "category": "atoms",
            "components":[
                {"component":"test","description": "Test component description", "bgColor": "#d57474"}
            ]
        }
    ]

    var template = $.templates("#compTmpl");

    template.link("#compContainer", data);

    var templateNav = $.templates("#theTmpl");

    templateNav.link("#result", data);


</script>
<?php include("footer.php"); ?>



