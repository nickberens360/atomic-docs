$('.js-edit-settings').click(function (event) {



    event.preventDefault();
    $.ajax(this.href, {
        success: function (data) {
            $('#js_actionDrawer__content').html($(data));




            $('#form-edit-settings').submit(function (event) {



                var compDir = $(this).find('input[name=compDir]').val();
                var compExt = $(this).find('input[name=compExt]').val();
                var stylesExt = $(this).find('input[name=stylesExt]').val();
                var stylesDir = $(this).find('input[name=stylesDir]').val();

                console.log(compDir);
                console.log(compExt);
                console.log(stylesExt);
                console.log(stylesDir);






                /*$.ajax({
                    type: 'POST',
                    url: 'atomic-core/temp-processing/temp-edit-settings.php',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })

                    .done(function (data) {

                        if (!data.success) {


                            if (data.errors.exists) {
                                $('.aa_errorBox__message').html("");
                                $('.aa_actionDrawer').prepend('<div class="aa_errorBox"><p class="aa_errorBox__message"><i class="fa fa-times aa_js-errorBox__close"></i> ' + data.errors.exists + '</p></div>').find('.aa_errorBox').hide().fadeIn(200);
                            }


                            if (data.errors.name) {
                                $('.aa_errorBox__message').html("");
                                $('.aa_actionDrawer').prepend('<div class="aa_errorBox"><p class="aa_errorBox__message"><i class="fa fa-times aa_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.aa_errorBox').hide().fadeIn(200);
                            }


                        } else {

                            window.location = 'atomic-core/?cat='+catName;
                        }
                    })
                    .fail(function (data) {
                        console.log(data);
                    });*/
                event.preventDefault();
            });




        },
        error: function () {
            //alert('did not worked!');
        }
    });
});