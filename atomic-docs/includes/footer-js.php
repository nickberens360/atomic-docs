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