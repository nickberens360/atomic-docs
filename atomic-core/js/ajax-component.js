
$('.js_add-edit-component').click(function (event) {

    var catName = $(this).data('cat');
    var compName = $(this).data('comp');





    event.preventDefault();
    $.ajax(this.href, {
        success: function (data) {
            $('#js_actionDrawer__content').html($(data));

            if(compName){

                var notesVal = $('#'+compName+'-container').find('.compNotes').data('description');
                var bgColor = $('#'+compName+'-container').find('.component').data('color');

                $('input[name=fileCreateName]').val(compName);
                $('textarea[name=compNotes]').val(notesVal);

                $(".bgColor").spectrum({
                    allowEmpty: true,
                    preferredFormat: "hex",
                    showInput: true,
                    color: bgColor,
                });


            }
            else{
                $(".bgColor").spectrum({
                    allowEmpty: true,
                    preferredFormat: "hex",
                    showInput: true
                });
            }










            //Submits create file data
            $('#form-create-file').submit(function (event) {





                var formData = {
                    'compDir': catName,
                    'fileCreateName': $('input[name=fileCreateName]').val(),
                    'compNotes': $('textarea[name=compNotes]').val(),
                    'bgColor': $('input[name=bgColor]').val()
                };
                // process the form
                $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'atomic-core/temp-process/temp-create-component.php', // the url where we want to POST
                        data: formData, // our data object
                        dataType: 'json', // what type of data do we expect back from the server
                        encode: true
                    })
                    // using the done promise callback
                    .done(function (data) {
                        // log data to the console so we can see
                        console.log(data);
                        // here we will handle errors and validation messages
                        if (!data.success) {
                            // handle errors for name ---------------


                            if (data.errors.exists) {
                                $('.aa_errorBox__message').html("");
                                $('.aa_actionDrawer').prepend('<div class="aa_errorBox"><p class="aa_errorBox__message"><i class="fa fa-times aa_js-errorBox__close"></i> ' + data.errors.exists + '</p></div>').find('.aa_errorBox').hide().fadeIn(200);
                            }


                            if (data.errors.name) {
                                $('.aa_errorBox__message').html("");
                                $('.aa_actionDrawer').prepend('<div class="aa_errorBox"><p class="aa_errorBox__message"><i class="fa fa-times aa_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.aa_errorBox').hide().fadeIn(200);
                            }


                        } else {


                            //window.location = 'atomic-core/' + reDirect + '.php';
                        }
                    })
                    // using the fail promise callback
                    .fail(function (data) {
                        // show any errors
                        // best to remove for production
                        console.log(data);
                    });
                // stop the form from submitting the normal way and refreshing the page
                event.preventDefault();
            });


        },
        error: function () {
            //alert('did not worked!');
        }
    });
});