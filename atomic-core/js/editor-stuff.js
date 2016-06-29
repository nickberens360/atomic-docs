$(document).ready(function() {



    $( ".ace_content" ).click(function() {
        $('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
        $(this).closest('.atomic-editorWrap').addClass('atomic-editorWrap-active');
    });

    $( ".js-close-editor" ).click(function() {
        $('.atomic-editorWrap').removeClass('atomic-editorWrap-active');
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



$('.atomic-editable').click(function() {

    var notesContent = $(this).text();

    var $this = $(this)

    $( '<form class="atomic-form"><textarea class="formGroup textChange"></textarea><div class="atomic-form-footer"><button type="submit" class="atomic-btns atomic-btn1">Save</button><span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span></div></form>' ).insertAfter( $this );

    $('.textChange').text(notesContent);

    $(this).css('display','none');

});



$('.atomic-editable-input').click(function() {

    var notesContent = $(this).text();

    var $this = $(this)

    $( '<form class="atomic-form"><input class="formGroup atomic-form-input textChange" /><div class="atomic-form-footer"><button type="submit" class="atomic-btns atomic-btn1">Save</button><span type="reset" class="js-close-editor atomic-btns atomic-btn2">Cancel</span></div></form>' ).insertAfter( $this );

    $('.textChange').val(notesContent);

    $(this).css('display','none');

});


