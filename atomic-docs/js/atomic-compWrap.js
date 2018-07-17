/* js/atomic-compWrap.js */

jQuery(document).ready(function ($) {




    new Clipboard('.atomic-copyBtn');







    $('.js-atomic-fullscreen-trigger').click(function (e) {
        e.preventDefault;
        $(this).closest('.atomic-compWrap').toggleClass('atomic-compWrap-full');

       $(this).text($(this).text() === "fullscreen_exit" ? "fullscreen" : "fullscreen_exit");



    });





    $('.atomic-markup-copyBtn').addClass('atomic-copyBtn-active');



});





function setupEditorMarkup(editormarkup, compId){

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
    /*var editormarkupval = editormarkup.getValue();



    editormarkupval = editormarkupval.replace(/<!--(.*?)-->/g, '');
    editormarkupval = editormarkupval.trim();



    $("#atomic-copy-target-markup-"+compId).val(editormarkupval);*/
    editormarkup.getSession().on('change', function () {
        var editormarkupval = editormarkup.getSession().getValue();
        /*editormarkupval = editormarkupval.replace(/<!--(.*?)-->/g, '');
        editormarkupval = editormarkupval.trim();*/
        $("#atomic-copy-target-markup-"+compId).val(editormarkupval);
    });


}





function setupEditorStyles(editorstyles, compId){
    //Editor Settings

    editorstyles.getSession().setUseWorker(false);
    editorstyles.getSession().setMode("ace/mode/scss");
    editorstyles.setOptions({
        maxLines: Infinity
    });
    editorstyles.setHighlightActiveLine(false);
    editorstyles.setShowPrintMargin(false);
    editorstyles.getSession().setTabSize(2);


    //Copy and paste stuff
    /*var editorstylesval = editorstyles.getValue();


    editorstylesval = editorstylesval.replace(/\/\*(.*?)\*\//g, '');


    editorstylesval = editorstylesval.trim();




    $("#atomic-copy-target-styles-"+compId).val(editorstylesval);*/
    editorstyles.getSession().on('change', function () {
        var editorstylesval = editorstyles.getSession().getValue();
        /*editorstylesval = editorstylesval.replace(/\/\*(.*?)\*\//g, '');
        editorstylesval = editorstylesval.trim();*/
        $("#atomic-copy-target-styles-"+compId).val(editorstylesval);
    });
}







function setupEditorJs(editorjs, compId){
    //Editor Settings

    editorjs.getSession().setUseWorker(false);
    editorjs.getSession().setMode("ace/mode/javascript");
    editorjs.setOptions({
        maxLines: Infinity
    });
    editorjs.setHighlightActiveLine(false);
    editorjs.setShowPrintMargin(false);
    editorjs.getSession().setTabSize(2);


    //Copy and paste stuff
    /*var editorjsval = editorjs.getValue();


    editorjsval = editorjsval.replace(/\/\*(.*?)\*\//g, '');
    editorjsval = editorjsval.trim();
    $("#atomic-copy-target-js-"+compId).val(editorjsval);*/
    editorjs.getSession().on('change', function () {
        var editorjsval = editorjs.getSession().getValue();
        /*editorjsval = editorjsval.replace(/\/\*(.*?)\*\//g, '');
        editorjsval = editorjsval.trim();*/
        $("#atomic-copy-target-js-"+compId).val(editorjsval);
    });
}


