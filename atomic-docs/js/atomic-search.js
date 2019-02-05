/* js/atomic-search.js */

jQuery( document ).ready(function( $ ) {




    var searchList = new List('atomic-search', {
        valueNames: ['atomic-search__item'],
        plugins: [ ListFuzzySearch() ]
    });


    searchList.on('searchStart',function (e,b,c) {

        console.log(e, b, c);

        $('.atomic-search__results').find('li a').removeClass('selected');
    });


    $('.js-atomic-searchTrigger').click(function (e) {
        e.preventDefault;
        $('.atomic-search').fadeIn('fast');
        $('.atomic-search__input').focus();
    });


    $('.js_atomic-search__close').click(function (e) {
        e.preventDefault;

        $('.atomic-search__results').find('li').removeClass('selected');
        //$('.atomic-search__input').val('');
        $('.atomic-search').fadeOut('fast');

        //monkeyList.clear();

    });






    $(document).on("keyup", function (event) {
        if (event.which == 13) {

            $(".selected a").trigger('click');
        }
    });
















   /*var $listItems = $('.atomic-search__results li');

    $('.atomic-search__input').keydown(function(e)
    {

        var key = e.keyCode,
            $selected = $listItems.filter('.selected'),
            $current;

        if ( key != 40 && key != 38 ) return;

        $listItems.removeClass('selected');

        if ( key == 40 ) // Down key
        {
            console.log($current);
            if ( ! $selected.length || $selected.is(':last-child') ) {
                $current = $listItems.eq(0);
            }
            else {
                $current = $selected.next();
            }
            console.log($current);
        }
        else if ( key == 38 ) // Up key
        {
            if ( ! $selected.length || $selected.is(':first-child') ) {
                $current = $listItems.last();
            }
            else {
                $current = $selected.prev();
            }
        }

        $current.addClass('selected');
    });*/






});