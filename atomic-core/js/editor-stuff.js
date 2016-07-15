/**
 * Created by michael on 6/30/16.
 */
$(document).ready(function () {


    $(".ace_content").click(function () {
        $('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
        $(this).closest('.atomic-editorWrap').addClass('atomic-editorWrap-active');
    });

    $(".js-close-editor").click(function () {
        $('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
    });


});

$(document).mouseup(function (e) {
    var container = $('.atomic-editorWrap');

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.removeClass('atomic-editorWrap-active');
    }
});




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
        'codeDest': codeDest,
    };

    $.ajax({
        type: 'POST',
        url: 'atomic-core/tempForms/temp-code-update-form.php',
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

                    $('.aa_errorBox__message').html("");
                    $('.atoms-main').prepend('<div class="aa_errorBox"><p class="aa_errorBox__message"><i class="fa fa-times aa_js-errorBox__close"></i> ' + data.message + '</p></div>').find('.aa_errorBox').hide().fadeIn(200);


                console.log(data.message );

                window.location = 'atomic-core/?v=atoms';
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




