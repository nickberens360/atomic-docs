/* js/atomic-pageBar.js */

jQuery(document).ready(function ($) {


    $('.atomic-compBar .js-atomic-compHeight-val').each(function () {
        var atomicOrigHeight = $(this).closest('.atomic-compWrap').find('.js-atomic-component').height();
        $(this).val(atomicOrigHeight+'px');
    });





    $(".atomic-component").resizable({
        handleSelector: "> .win-size-grip",

        onDrag: function (e, $el, newWidth, newHeight, opt) {


            var compWidthVal = $el.css('width');
            var compHeightVal = $el.css('height');
            

            $el.closest('.atomic-compWrap').find('.js-atomic-compWidth-val').val(compWidthVal);
            $el.closest('.atomic-compWrap').find('.js-atomic-compHeight-val').val(compHeightVal);



        }

    });


    $('.atomic-pageBar .js-atomic-dashControl').click(function (e) {
        e.preventDefault();
        var compWidth = $(this).data("atomicwidth");
        $('.atomic-component').css('width', compWidth);
        $('.js-atomic-compWidth-val').val(compWidth);
    });







    $('.atomic-compBar .js-atomic-dashControl').click(function (e) {
        e.preventDefault();
        var compWidth = $(this).data("atomicwidth");

        $(this).closest('.atomic-compWrap').find('.atomic-component').css('width', compWidth);

        $(this).closest('.atomic-compWrap').find('.js-atomic-compWidth-val').val(compWidth);

    });








    $('.atomic-pageBar .js-atomic-compWidth-val').bind("enterKey",function(e){

        var compWidthVal = $(this).val();
        $('.atomic-compWrap').find('.js-atomic-component').width(compWidthVal);

    });

    $('.atomic-pageBar .js-atomic-compWidth-val').keyup(function(e){
        if(e.keyCode === 13)
        {
            $(this).trigger("enterKey");
        }
    });





    $('.atomic-pageBar .js-atomic-compHeight-val').bind("enterKey",function(e){

        var compHeightVal = $(this).val();
        $('.atomic-compWrap').find('.js-atomic-component').height(compHeightVal);

    });

    $('.atomic-pageBar .js-atomic-compWidth-val').keyup(function(e){
        if(e.keyCode === 13)
        {
            $(this).trigger("enterKey");
        }
    });













    $('.js-atomic-compWidth-val').bind("enterKey",function(e){

        var compWidthVal = $(this).val();
        $(this).closest('.atomic-compWrap').find('.js-atomic-component').width(compWidthVal);

    });

    $('.js-atomic-compWidth-val').keyup(function(e){
        if(e.keyCode === 13)
        {
            $(this).trigger("enterKey");
        }
    });



    $('.js-atomic-compHeight-val').bind("enterKey",function(e){

        var compHeightVal = $(this).val();
        $(this).closest('.atomic-compWrap').find('.js-atomic-component').height(compHeightVal);

    });

    $('.js-atomic-compHeight-val').keyup(function(e){
        if(e.keyCode === 13)
        {
            $(this).trigger("enterKey");
        }
    });






});