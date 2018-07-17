/* js/atomic-tabs.js */

jQuery( document ).ready(function( $ ) {

        $('.atomic-markup-copyBtn').addClass('atomic-copyBtn-active');


        $('.atomic-tabs__item').click(function(){

            var $parent = $(this).parent();

            var tab_id = $(this).attr('data-tab');



            $parent.find('li').removeClass('atomic-tabs__current');
            $parent.parent().find('.atomic-tabs__content').removeClass('atomic-tabs__current');



            $(this).addClass('atomic-tabs__current');
            $parent.parent().find("#"+tab_id).addClass('atomic-tabs__current');




            if(tab_id === 'atomic-markup-tab'){
                $parent.find('.atomic-copyBtn').removeClass('atomic-copyBtn-active');
                $parent.find('.atomic-markup-copyBtn').addClass('atomic-copyBtn-active');
            }
            else if(tab_id === 'atomic-styles-tab'){
                $parent.find('.atomic-copyBtn').removeClass('atomic-copyBtn-active');
                $parent.find('.atomic-styles-copyBtn').addClass('atomic-copyBtn-active');
            }

            else if(tab_id === 'atomic-js-tab'){
                $parent.find('.atomic-copyBtn').removeClass('atomic-copyBtn-active');
                $parent.find('.atomic-js-copyBtn').addClass('atomic-copyBtn-active');
            }




        });


});


