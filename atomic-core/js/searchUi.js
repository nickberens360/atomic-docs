$('.js_searchTrigger').click(function() {
    $('.atomic-search').toggleClass('atomic-search-open');
    $('.searchInput').focus();
});

$(document).mouseup(function (e)
{
    var container = $('.atomic-search');

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.removeClass('atomic-search-open');
    }
});




