$(document).ready(function() {


    $( ".ace_content" ).click(function() {
        $('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
        $(this).closest('.atomic-editorWrap').addClass('atomic-editorWrap-active');
    });

    $( ".js-close-editor" ).click(function() {
        $('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
        location.reload();
    });


    $( ".js-copyBtn-edit" ).click(function() {
        $('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
        $(this).closest('.atomic-editorWrap').addClass('atomic-editorWrap-active');
    });

});

$(document).mouseup(function (e)
{
    var container = $('.atomic-editorWrap');

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.removeClass('atomic-editorWrap-active');
    }
});
