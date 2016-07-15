
$(".atoms-nav ").sortable({
    group: ".aa_dir ",
    handle: ".aa_dir__dirNameGroup__name",
    onStart: function (evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        var catName = $(itemEl).data("navitem");;


        console.log('Category name : ' + catName);
    },
    onAdd: function (evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        var navItemParent = $(itemEl).closest('.aa_dir').data("navitem");

        console.log('New category: ' + navItemParent);
    },
    onEnd: function (/**Event*/evt) {
        var oldPosition = evt.oldIndex;
        var newPosition = evt.newIndex;

        console.log('Old Category position: ' + oldPosition);
        console.log('New Category position: ' + newPosition);
    }
});




$(".aa_fileSection").sortable({
    group: ".aa_fileSection ",
    filter: ".aa_addFileItem",
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
    onEnd: function (/**Event*/evt) {
        var oldPosition = evt.oldIndex;
        var newPosition = evt.newIndex;

        console.log('Old position: ' + oldPosition);
        console.log('New position: ' + newPosition);
    }
});
