$('.catAdd .aa_actionBtn').click(function (event) {


    event.preventDefault();
    $.ajax(this.href, {
        success: function (data) {
            $('#js_actionDrawer__content').html($(data));


            //Submits create category data
            $('#form-create-category').submit(function (event) {
                reDirect = $('input[name=dirName]').val();
                // remove the error text
                // get the form data
                // there are many ways to get this data using jQuery (you can use the class or id also)
                var formData = {
                    'dirName': $('input[name=dirName]').val()
                };
                // process the form
                $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'atomic-core/partial-mngr/create-category.php', // the url where we want to POST
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

                            //redirect here
                            window.location = 'atomic-core/' + reDirect + '.php';
                            // usually after form submission, you'll want to redirect
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

            //Submits delete category data
            $('#form-delete-category').submit(function (event) {
                // remove the error text
                // get the form data
                // there are many ways to get this data using jQuery (you can use the class or id also)
                var formData = {
                    'dirName': $('input[name=inputNameDelete]').val()
                };
                // process the form
                $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'atomic-core/partial-mngr/delete-category.php', // the url where we want to POST
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
                            //redirect here
                            window.location = 'atomic-core/index.php';
                            // usually after form submission, you'll want to redirect
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