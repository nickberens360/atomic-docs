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
    var newCode = $(this).find('.new-val-input').val();



    var formData = {
        'compName': compName,
        'catName': catName,
        'newCode': newCode,
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
                // handle errors for name ---------------


                if (data.errors.exists) {

                }


                if (data.errors.name) {
                    console.log(data.errors.name);
                    alert('yo');
                }

            } else {


                alert('worked');

                //redirect here
                window.location = 'atomic-core/?v=atoms';
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




