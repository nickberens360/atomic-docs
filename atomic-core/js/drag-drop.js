$(".atoms-nav ").sortable({
    group: ".aa_dir ",
    handle: ".aa_dir__dirNameGroup__name",
    /*onStart: function (evt) {
     var itemEl = evt.item;  // dragged HTMLElement
     var catName = $(itemEl).data("navitem");;


     console.log('Category name : ' + catName);
     },
     onAdd: function (evt) {
     var itemEl = evt.item;  // dragged HTMLElement
     var navItemParent = $(itemEl).closest('.aa_dir').data("navitem");

     console.log('New category: ' + navItemParent);
     },*/



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



                    console.log('success');

                   // window.location = 'atomic-core/?v=atoms';
                }
            })
            // using the fail promise callback
            .fail(function (data) {
                // show any errors
                // best to remove for production
                console.log('failed');
                //console.log(data);
            });


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
