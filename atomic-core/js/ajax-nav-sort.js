$(".atoms-nav ").sortable({
    group: ".aa_dir ",
    handle: ".aa_dir__dirNameGroup__name",
    /*onEnd: function (evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        var catName = $(itemEl).closest('.aa_dir').data("navitem");
        var formData = [];
        $(".atoms-nav ").find('.aa_dir').each(function () {
            formData.push({
                name:'catName[]',
                value:$(this).data("navitem"),
            });
        });
        $.ajax({
                type: 'POST',
                url: 'atomic-core/tempForms/temp-nav-cat-sort.php',
                data: formData,
                dataType: 'json',
                encode: true
            })
            .done(function (data) {
                console.log(data);
                if (!data.success) {
                    console.log('not success');
                    if (data.errors.name) {
                        //do error stuff
                    }
                } else {
                    console.log('success');
                    window.location = 'atomic-core/?v='+catName+'';
                }
            })
            .fail(function (data) {
                console.log('failed');
            });


    }*/
});
