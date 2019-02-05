$(document).ready(function() {


    /*var editorHeight = $('.ace_content').outerHeight();

     console.log(editorHeight);

     if(editorHeight < 166){
     $( ".js-expand" ).remove();
     }*/


    $( ".js-expand" ).click(function(e) {
        e.preventDefault();

        //$('.codeBlocks').removeClass('codeBlocks-open');
        $(this).closest('.codeBlocks').toggleClass('codeBlocks-open');
    });




    



    $( ".ace_content" ).click(function() {
        $('.codeBlocks').removeClass('atomic-editorWrap-active');
        $(this).closest('.codeBlocks').addClass('atomic-editorWrap-active');
    });

    $( ".js-close-editor" ).click(function() {
        $('.codeBlocks').removeClass('atomic-editorWrap-active');
        location.reload();
    });


    $( ".js-copyBtn-edit" ).click(function() {
        $('.codeBlocks').removeClass('atomic-editorWrap-active');
        $(this).closest('.codeBlocks').addClass('atomic-editorWrap-active');
    });

});

$(document).mouseup(function (e)
{
    var container = $('.codeBlocks');

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.removeClass('atomic-editorWrap-active');
    }
});
