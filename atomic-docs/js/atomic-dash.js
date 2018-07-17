/* js/atomic-dash.js */

jQuery( document ).ready(function( $ ) {

    $('.js-atomic-dash__hide').click(function (e) {

        e.preventDefault();

        $('body').toggleClass('atomic-dash-is-active');


    });


    /*$('.js-atomic-dash__show').click(function (e) {
        e.preventDefault;
        $('body').removeClass('atomic-dash-is-closed');
        $('body').addClass('atomic-dash-is-open');
    });*/



});