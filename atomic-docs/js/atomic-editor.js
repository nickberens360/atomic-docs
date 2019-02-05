/* js/atomic-editor.js */

jQuery(document).ready(function ($) {

    var $body = $('body');


    $body.on('click', '.ace_content', function () {
        $('.atomic-tabs').removeClass('atomic-tabs-active');
        $(this).closest('.atomic-tabs').addClass('atomic-tabs-active');
    });


    $(".js-atomic-editorFooter__cancel").click(function () {
        $('.atomic-tabs').removeClass('atomic-tabs-active');
    });


    $body.on('click', '.note-editable', function () {

        $('.atomic-tabs').removeClass('atomic-tabs-active');
        $(this).closest('.atomic-tabs').addClass('atomic-tabs-active');

    });


    function initializeComponent($comp) {
        var compId = $comp.data('id');
        var hasJs = $comp.data('js');
        var $colorPicker = $comp.find('.atomic-colorPicker');
        var $placeHolder = $comp.find('.atomic-placeholder');
        var $compActual = $comp.find('.atomic-component');
        var $btnWidthCntrl = $comp.find('.js-atomic-dashControl');
        var $inputWidth = $comp.find('.js-atomic-compWidth-val');
        var $inputHeight = $comp.find('.js-atomic-compHeight-val');
        var $tab = $comp.find('.atomic-tabs__item');
        var $summernote = $comp.find('.summernote');
        var $jsCheckBox = $comp.find('.atomic-js-input');


        initializeColorPicker($colorPicker);
        initializeIframes($placeHolder);
        initializeEditor(compId, hasJs);
        initializeResizeHandle($compActual);
        initializeWidthButtons($btnWidthCntrl);
        initializeDimensionInputs($inputWidth, $inputHeight);
        initializeTabs($tab);
        initializeSummerNote($summernote);
        resizeIframe($comp);
        initializeJsCheck($jsCheckBox);
    }


    $body.on('ajax_form_action/componentNew', function (e, data, params) {


        $body.removeClass('atomic-editPane-open');

        var html = data.html[0].html || data.html;
        var id=$(html).attr('id');

        initializeComponent($('#'+id));
        initializeGlobalDim();


    });






    $body.on('ajax_form_action/atomic-edit-component', function (e, data, params) {
        $body.removeClass('atomic-editPane-open');

        var html = data.html[0].html || data.html;
        var id=$(html).attr('id');

        initializeComponent($('#'+id));
    });





    $body.on('ajax_form_action/atomic-edit-color', function (e, data, params) {



        var html = data.html[0].html || data.html;
        var id=$(html).attr('id');


        initializeComponent($('#'+id));
        initializeGlobalDim();

    });

    $body.on('ajax_form_action/add-js-file', function (e, data, params) {


        var html = data.html[0].html || data.html;
        var id=$(html).attr('id');

        initializeComponent($('#'+id));

    });



    $body.on('ajax_form_action/atomic-edit-category', function (e, data, params) {

        $body.removeClass('atomic-editPane-open');


    });



    $body.on('ajax_form_action/srcEdit', function (e, data, params) {

        initializeComponent($('#'+data['slug']));


    });



    $body.on('ajax_form_action/add-js-file', function (e, data, params) {

        initializeComponent($('#'+data['slug']));

    });


    $body.on('ajax_action/delete-component', function (e, data, params) {

        $('#'+data.compSlug).remove();

    });













    $('.atomic-compWrap').one('inview', function (event, isInView) {
        if (isInView) {
            initializeComponent($(this));
        }
    });



    $body.on('click', '.js-atomic-catContent-trigger', function() {
        $(this).closest('li').toggleClass('atomic-active');
    });






    initializeGlobalDim();





});