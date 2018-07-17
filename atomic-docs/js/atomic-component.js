jQuery(document).ready(function ($) {




    /*$('body').on('click', '.js-atomic-add-component', function () {

        App.ajax({
            url: '/option/sidebar'
        })
            .then(function (data) {

                $('.atomic-editPanel__form').prepend(data.response.html);

                $('.atomic-input').focus();

                $('#atomic-file-cat').attr('value', cat_name);
                $('#atomic-file-catID').attr('value', cat_id);


            });
    });*/










   /* $('body').on('click', '.js-atomic-add-component', function () {
        $('body').addClass('atomic-editPane-open');
        App.ajax({
            url: '/component/add/'
        })
            .then(function (data) {

                $('.atomic-editPanel__form').prepend(data.response.html);

                $('.atomic-input').focus();

                $('#atomic-file-cat').attr('value', cat_name);
                $('#atomic-file-catID').attr('value', cat_id);


                $(".atomic-colorPicker").spectrum({
                    allowEmpty: true,
                    preferredFormat: "hex",
                    showInput: true
                });


            });
     });*/


    /*$('body').on('click', '.js-atomic-edit-component', function () {
        $('body').addClass('atomic-editPane-open');
        App.ajax({
            url: '/component/add/'
        })
            .then(function (data) {

                $('.atomic-editPanel__form').html(data.response.html);

                $('.atomic-input').focus();


            });
    });*/











    /*$('body').on('click', '.js-atomic-cancel-add-comp', function(e) {
        e.preventDefault();
        $('.atomic-add-comp-form').remove();
    });*/

    $('body').on('click', '.js-atomic-editPanel-close', function(e) {
        e.preventDefault();
        $('body').removeClass('atomic-editPane-open');
        $('.atomic-editPanel__form').empty();

    });




    $(".atomic-js-input").change(function() {

        if(this.checked) {
            $(this).closest('form').trigger('submit');
            return;

        }
    });




    $(".atomic-colorPicker").spectrum({
        allowEmpty: true,
        preferredFormat: "hex",
        showInput: true,
        change: function(color) {
            $(this).closest('form').trigger('submit');
        }
    });





});