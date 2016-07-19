$(".atoms-nav ").sortable({
    group: ".aa_dir ",
    handle: ".aa_dir__dirNameGroup__name",
    onEnd: function (evt) {
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


    }
});





















/*
$(".aa_fileSection").sortable({
    group: ".aa_fileSection ",
    filter: ".aa_addFileItem",

    onUpdate: function (evt) {
        var oldPosition = evt.oldIndex;
        var newPosition = evt.newIndex;

        console.log('Old position: ' + oldPosition);
        console.log('New position: ' + newPosition);
    },

    onStart: function (evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        var currentComp = $(itemEl).data("component");
        var currentCat = $(itemEl).data("category");

        console.log('Component name: ' + currentComp);
        console.log('Current category: ' + currentCat);
    },
    onAdd: function (evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        var navItemParent = $(itemEl).closest('.aa_dir').data("navitem");

        console.log('New category: ' + navItemParent);
    },
    onEnd: function (/!**Event*!/evt) {
        var oldPosition = evt.oldIndex;
        var newPosition = evt.newIndex;

        console.log('Old position: ' + oldPosition);
        console.log('New position: ' + newPosition);
    }
});
*/