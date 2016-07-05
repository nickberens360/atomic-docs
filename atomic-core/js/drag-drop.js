
$(function () {
    $(".aa_fileSection").sortable({
        connectWith: ".aa_fileSection",
        start: function (event, ui) {
            compVal = ui.item.find('a').attr("data-component");
            console.log(compVal);

            catVal = ui.item.find('a').attr("data-category");
            console.log(catVal);
        },
        stop: function (event, ui) {
            compVal = ui.item.find('a').attr("data-component");
            console.log(compVal);

            newCatVal = ui.item.closest('.aa_dir').find('.aa_dir__dirNameGroup__name').text();
            console.log(newCatVal);

        }
    });


});
