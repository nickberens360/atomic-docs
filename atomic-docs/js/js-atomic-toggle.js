/* js/js-atomic-toggle.js */

jQuery( document ).ready(function( $ ) {



    $('.js-atomic-toggle__trigger').click(function () {

        console.log('trigger');

        $(this).closest('.js-atomic-toggle').toggleClass('js-atomic-toggle-active');
        $(this).closest('.js-atomic-toggle').find('.js-atomic-toggle__target:first').slideToggle();
    });

});