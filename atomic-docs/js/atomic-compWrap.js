/* js/atomic-compWrap.js */

jQuery(document).ready(function ($) {




    new Clipboard('.atomic-copyBtn');











    $('body').on('click', '.js-atomic-fullscreen-trigger', function() {

        $(this).closest('.atomic-compWrap').toggleClass('atomic-compWrap-full');

       $(this).find('i').text($(this).text() === "fullscreen_exit" ? "fullscreen" : "fullscreen_exit");



    });


    $('.atomic-markup-copyBtn').addClass('atomic-copyBtn-active');



});









