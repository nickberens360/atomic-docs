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









