$('.atomic-editorWrap').submit(function (event) {



    event.preventDefault();


    var compName = $(this).data('editorformcomp');
    var catName = $(this).data('editorformcat');
    var codeDest = $(this).data('codedest');


    var newCode = $(this).find('.new-val-input').val();




    var formData = {
        'compName': compName,
        'catName': catName,
        'newCode': newCode,
        'codeDest': codeDest
    };

    $.ajax({
            type: 'POST',
            url: 'atomic-core/temp-processing/temp-editor.php',
            data: formData,
            dataType: 'json',
            encode: true
        })
        // using the done promise callback
        .done(function (data) {
            // log data to the console so we can see
            console.log(data);
            // here we will handle errors and validation messages
            if (!data.success) {


                console.log('not success');



                if (data.errors.name) {
                    $('.aa_errorBox__message').html("");
                    $('.atoms-main').prepend('<div class="aa_errorBox"><p class="aa_errorBox__message"><i class="fa fa-times aa_js-errorBox__close"></i> ' + data.errors.name + '</p></div>').find('.aa_errorBox').hide().fadeIn(200);
                }

            } else {



                $('.se-pre-con').fadeIn('slow');

                setTimeout(function() {
                  window.location = 'atomic-core/?cat='+catName;
                }, 2000);
            }
        })
        // using the fail promise callback
        .fail(function (data) {
            // show any errors
            // best to remove for production
            console.log('failed');
            console.log(data);
        });
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
});