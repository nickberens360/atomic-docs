<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>JumpOff</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/main.css" rel="stylesheet">

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <script src="https://use.fontawesome.com/f13dbf90b6.js"></script>




    <?php /*include 'functions.php'*/?>

</head>

<body>







<div id="atomic-search" class="atomic-search">
    <i class="fa fa-times fa-3x js_atomic-search__close atomic-search__close"></i>
    <div class="atomic-search__content">
        <div class="atomic-search__inputWrap">
            <input type="text" class="fuzzy-search atomic-search__input" placeholder="Search Components">
        </div>
        <ul class="list atomic-search__results">
            <li><a class="atomic-search__item" href="#" onclick="location.href='https://www.wisnet.com/';">Item</a href="#"></li>
            <li><a class="atomic-search__item" href="#" onclick="location.href='https://www.google.com/';">Test</a></li>
            <li><a class="atomic-search__item" href="#" onclick="location.href='https://www.google.com/';">New</a></li>
        </ul>
    </div>
</div>

<div class="atomic-editPanel">
    <div class="atomic-editPanel__inner">
        <a href="#" class="js-atomic-editPanel-close atomic-editPanel__close">
            <i class="fa fa-times fa-3x"></i>
        </a>

        <form action="">
            <div class="atomic-formGroup">
                <label for="" class="atomic-label">Label</label>
                <input type="text" class="atomic-input">
            </div>
            <div class="atomic-formGroup">
                <label for="" class="atomic-label">Label</label>
                <textarea name="" id="" class="atomic-textarea"></textarea>
            </div>
        </form>
        <div class="atomic-formGroup">
            <label for="" class="atomic-label">Label</label>
            <input class="atomic-colorPicker" type="text" name="bgColor" value="">
        </div>

        <div class="atomic-btnGroup">
            <button class="atomic-btn atomic-btn-1">Save</button>
            <button class="atomic-btn atomic-btn-simple"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </div>


        <div class="atomic-hint">
            <h4 class="atomic-hint__title">Title</h4>
            <p>To change the order the components appear on the page you can simply drag and drop them in the sidebar. You can
                also move them to a different category by dragging and dropping them into the desired category's component list.
                All changes will also be reflected in the project's file structure as well as the @import style strings order as
                well!</p>
        </div>


    </div>
</div>







<div class="atomic-dash">

    <div class="atomic-dash__side atomic-dash__item">

        <div class="atomic-sideBar">

            <div class="atomic-controlBar">
                <ul class="atomic-actions">
                    <li><a href="#" class="js-atomic-dash__hide atomic-dash__hide"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="js-atomic-searchTrigger"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="js-atomic-open-editPanel"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
                </ul>
            </div>


            <div class="atomic-logoBox">
                <img src="img/atomic-logo.svg" alt="">
                <!--<img src="img/atomic-logo.svg" alt="">-->
            </div>


            <div class="atomic-dirBoxGroup">


                <div class="atomic-dirBox">
                    <a href="#" class="atomic-dirBox__dir"><i class="js-atomic-dirBox__trigger fa fa-folder" aria-hidden="true"></i> <span class="atomic-dirBox__dir-handle">Two</span></a>

                    <div class="atomic-dirBox__content">
                        <a href="#" class="atomic-dirBox__add"><i class="fa fa-plus" aria-hidden="true"></i> Add Component</a>
                        <ul class="atomic-dirBox__list">
                            <li class="atomic-dirBox__listItem"><a href="#">2-1</a></li>
                            <li class="atomic-dirBox__listItem"><a href="#">2-2</a></li>
                            <li class="atomic-dirBox__listItem"><a href="#">2-3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="atomic-dirBox">
                    <a href="#" class="atomic-dirBox__dir"><i class="js-atomic-dirBox__trigger fa fa-folder" aria-hidden="true"></i> <span class="atomic-dirBox__dir-handle">Three</span></a>

                    <div class="atomic-dirBox__content">
                        <a href="#" class="atomic-dirBox__add"><i class="fa fa-plus" aria-hidden="true"></i> Add Component</a>
                        <ul class="atomic-dirBox__list">
                            <li class="atomic-dirBox__listItem"><a href="#">3-1</a></li>
                            <li class="atomic-dirBox__listItem"><a href="#">3-2</a></li>
                            <li class="atomic-dirBox__listItem"><a href="#">3-3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="atomic-dirBox">
                    <a href="#" class="atomic-dirBox__dir"><i class="js-atomic-dirBox__trigger fa fa-folder" aria-hidden="true"></i> <span class="atomic-dirBox__dir-handle">Four</span></a>

                    <div class="atomic-dirBox__content">
                        <a href="#" class="atomic-dirBox__add"><i class="fa fa-plus" aria-hidden="true"></i> Add Component</a>
                        <ul class="atomic-dirBox__list">
                            <li class="atomic-dirBox__listItem"><a href="#">4-1</a></li>
                            <li class="atomic-dirBox__listItem"><a href="#">4-2</a></li>
                            <li class="atomic-dirBox__listItem"><a href="#">4-3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="atomic-dirBox">
                    <a href="#" class="atomic-dirBox__dir"><i class="js-atomic-dirBox__trigger fa fa-folder" aria-hidden="true"></i> <span class="atomic-dirBox__dir-handle">Five</span></a>

                    <div class="atomic-dirBox__content">
                        <a href="#" class="atomic-dirBox__add"><i class="fa fa-plus" aria-hidden="true"></i> Add Component</a>
                        <ul class="atomic-dirBox__list">
                            <li class="atomic-dirBox__listItem"><a href="#">5-1</a></li>
                            <li class="atomic-dirBox__listItem"><a href="#">5-2</a></li>
                            <li class="atomic-dirBox__listItem"><a href="#">5-3</a></li>
                        </ul>
                    </div>
                </div>

                <div class="atomic-dirBoxGroup__footer">
                    <a href="#" class="atomic-btn atomic-btn-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
                </div>
            </div>






        </div>

    </div>

    <div class="atomic-dash__main atomic-dash__item">
        <div class="atomic-pageBarWrap">
            <div class="atomic-pageBar">
                <div class="atomic-pageBar__item atomic-pageBar__left">
                    <h1 class="atomic-catTitle">Category <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
                </div>
                <div class="atomic-pageBar__item atomic-pageBar__right">
                    <ul class="atomic-dashControls">
                        <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="100%"><i class="fa fa-desktop" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="768px"><i class="fa fa-tablet" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="375px"><i class="fa fa-mobile" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

            </div>


        </div>

        <p class="atomic-catDescription">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, aliquam asperiores aspernatur cumque dicta ea eaque eos illo
            inventore.</p>
        <div class="atomic-dash__content">

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

                                    <div class="atomic-editor" id="atomic-editor-markup">
<textarea><div class="box">Box</div></textarea>
                                    </div>

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

                                    <div class="atomic-editor" id="atomic-editor-styles">
.box{
    height: 150px;
    width: 100%;
    background: #c5c5c5;
    padding: 20px;
    color: #fff;
}
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

        </div>

    </div>
</div>


<script src="js/min/site.min.js"></script>


<script src="vendor-js/ace-editor/src-min/ace.js"></script>
<script>

    //MARKUP EDITOR

    var editormarkup = ace.edit("atomic-editor-markup");

    //Editor Settings
    editormarkup.getSession().setUseWorker(false);
    editormarkup.getSession().setMode("ace/mode/html");
    editormarkup.setOptions({
        maxLines: Infinity
    });
    editormarkup.setHighlightActiveLine(false);
    editormarkup.setShowPrintMargin(false);
    editormarkup.getSession().setUseWrapMode(true);
    editormarkup.getSession().setTabSize(2);


    //Copy and paste stuff
    var editormarkupval = editormarkup.getValue();
    editormarkupval = editormarkupval.replace(/<!--(.*?)-->/g, '');
    editormarkupval = editormarkupval.trim();
    $("#atomic-copy-target-markup").val(editormarkupval);
    editormarkup.getSession().on('change', function () {
        var editormarkupval = editormarkup.getSession().getValue()
        editormarkupval = editormarkupval.replace(/<!--(.*?)-->/g, '');
        editormarkupval = editormarkupval.trim();
        $("#atomic-copy-target-markup").val(editormarkupval);
    });






    //STYLES EDITOR

    //Editor Settings
    var editorstyles = ace.edit("atomic-editor-styles");
    editorstyles.getSession().setUseWorker(false);
    editorstyles.getSession().setMode("ace/mode/scss");
    editorstyles.setOptions({
        maxLines: Infinity
    });
    editorstyles.setHighlightActiveLine(false);
    editorstyles.setShowPrintMargin(false);
    editorstyles.getSession().setTabSize(2);


    //Copy and paste stuff
    var editorstylesval = editorstyles.getValue();
    editorstylesval = editorstylesval.replace(/\/\*(.*?)\*\//g, '');
    editorstylesval = editorstylesval.trim();
    $("#atomic-copy-target-styles").val(editorstylesval);
    editorstyles.getSession().on('change', function () {
        var editorstylesval = editorstyles.getSession().getValue()
        editorstylesval = editorstylesval.replace(/\/\*(.*?)\*\//g, '');
        editorstylesval = editorstylesval.trim();
        $("#atomic-copy-target-styles").val(editorstylesval);
    });



</script>
<script>

    $(".atomic-colorPicker").spectrum({
        allowEmpty: true,
        preferredFormat: "hex",
        showInput: true
    });


</script>
<script src="vendor-js/newSort/jquery.fn.sortable.js"></script>
<script>

    $(".atomic-dirBox__list").sortable({
        group: "atomic-dirBox__list"
    });

    $(".atomic-dirBoxGroup ").sortable({
        handle: ".atomic-dirBox__dir-handle"
    });

</script>







</body>