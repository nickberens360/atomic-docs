jQuery( document ).ready(function( $ ) {

  //$( '.toggle' ).click(function() {
//    $(this).toggleClass('toggle-open');
//    $('.navMain__cover').toggleClass('navMain-open');
//  });

  $( '.toggle' ).click(function() {
    $(this).toggleClass('toggle-open');
    $('.navMain__standard').find('.navMain-inner').slideToggle();
  });






});