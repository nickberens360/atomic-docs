/* js/atomic-editor.js */

jQuery( document ).ready(function( $ ) {

    $( ".ace_content" ).click(function() {
        $('.atomic-tabs').removeClass('atomic-tabs-active');
        $(this).closest('.atomic-tabs').addClass('atomic-tabs-active');
    });

    $( ".js-atomic-editorFooter__cancel" ).click(function() {
        $('.atomic-tabs').removeClass('atomic-tabs-active');
    });





});