for (var i = 0; i < $('.atomic-dropable').length; i++) {
    Sortable.create(document.getElementsByClassName("atomic-dropable")[i], {
        animation: 150,




        // onAdd: function (evt) {
        //     var itemEl = evt.item;  // dragged HTMLElement
        //     var movedFrom = evt.from;  // previous list
        //     var movedTo = evt.to;    // target list
        //
        //
        //     itemEl = $(itemEl).data('comp');
        //     movedFrom = $(movedFrom).data('cat');
        //     movedTo = $(movedTo).data('cat');
        //
        //     console.log('==============================================');
        //     console.log('Moved from: ' + movedFrom);
        //     console.log('Moved to: ' + movedTo);
        //     console.log('Item name: ' + itemEl);
        //
        // },

        onUpdate: function (evt) {
            var itemEl = evt.item;  // dragged HTMLElement
            var movedFrom = evt.from;  // previous list
            var movedTo = evt.to;    // target list
            var oldIndex = evt.oldIndex;  // element's old index within old parent
            var newIndex = evt.newIndex;  // element's new index within new parent


            slug = $(itemEl).data('slug');
            type = $(itemEl).data('type');
            movedFrom = $(movedFrom).data('cat');
            movedTo = $(movedTo).data('cat');


            console.log('==============================================');
            console.log('Moved from: ' + movedFrom);
            console.log('Moved to: ' + movedTo);
            console.log('Item slug: ' + slug);
            console.log('Item type: ' + type);
            console.log('Old index: ' + oldIndex);
            console.log('New index: ' + newIndex);

        }







    });

}





/*for (var i = 0; i < $('.atomic-fileDrop').length; i++) {
    Sortable.create(document.getElementsByClassName("atomic-fileDrop")[i], {
        animation: 150,




        onAdd: function (evt) {
            var itemEl = evt.item;  // dragged HTMLElement
            var movedFrom = evt.from;  // previous list
            var movedTo = evt.to;    // target list


            itemEl = $(itemEl).data('comp');
            movedFrom = $(movedFrom).data('cat');
            movedTo = $(movedTo).data('cat');

            console.log('==============================================');
            console.log('Moved from: ' + movedFrom);
            console.log('Moved to: ' + movedTo);
            console.log('Component name: ' + itemEl);

        },

        onUpdate: function (evt) {
            var itemEl = evt.item;  // dragged HTMLElement
            var movedFrom = evt.from;  // previous list
            var movedTo = evt.to;    // target list


            itemEl = $(itemEl).data('comp');
            movedFrom = $(movedFrom).data('cat');
            movedTo = $(movedTo).data('cat');

            console.log('==============================================');
            console.log('Moved from: ' + movedFrom);
            console.log('Moved to: ' + movedTo);
            console.log('Component name: ' + itemEl);
        }







    });

}





for (var i = 0; i < $('.atomic-catItemGroup').length; i++) {
    Sortable.create(document.getElementsByClassName("atomic-catItemGroup")[i], {
        animation: 150,




        onAdd: function (evt) {
            var itemEl = evt.item;
            var movedFrom = evt.from;
            var movedTo = evt.to;


            itemEl = $(itemEl).data('cat');
            movedFrom = $(movedFrom).data('parent');
            movedTo = $(movedTo).data('parent');


            console.log('==============================================');
            console.log('Moved from: ' + movedFrom);
            console.log('Moved to: ' + movedTo);
            console.log('Category name: ' + itemEl);


        },





        onUpdate: function (evt) {
            var itemEl = evt.item;
            var movedFrom = evt.from;
            var movedTo = evt.to;


            itemEl = $(itemEl).data('cat');
            movedFrom = $(movedFrom).data('parent');
            movedTo = $(movedTo).data('parent');


            console.log('==============================================');
            console.log('Moved from: ' + movedFrom);
            console.log('Moved to: ' + movedTo);
            console.log('Category name: ' + itemEl);
        }

    });

}*/












/*for (var i = 0; i < $('.atomic-fileDrop').length; i++) {
    Sortable.create(document.getElementsByClassName("atomic-fileDrop")[i], {
        animation: 150,
        group: '.atomic-fileDrop',



        onEnd: function (/!**Event*!/evt) {
            var itemEl = evt.item;  // dragged HTMLElement
            var movedFrom = evt.from;  // previous list

            itemEl = $(itemEl).data('comp');
            movedFrom = $(movedFrom).data('cat');


            console.log('Component name: ' + itemEl);
            console.log('Moved from: ' + movedFrom);

        },

        onAdd: function (/!**Event*!/evt) {
            var movedTo = evt.to;    // target list



            console.log('==============================================');
            movedTo = $(movedTo).data('cat');
            console.log('Moved to: ' + movedTo);
        }

    });

}*/









/*
for (var i = 0; i < $('.atomic-catItemGroup').length; i++) {
    Sortable.create(document.getElementsByClassName("atomic-catItemGroup")[i], {
        animation: 150,
        group: '.atomic-catItemGroup',



        onEnd: function (/!**Event*!/evt) {
            var itemEl = evt.item;  // dragged HTMLElement
            var movedFrom = evt.from;  // previous list


            itemEl = $(itemEl).data('cat');
            movedFrom = $(movedFrom).data('parent');


            console.log('Moved from: ' + movedFrom);
            console.log('Category name: ' + itemEl);

        },

        onAdd: function (/!**Event*!/evt) {
            var movedTo = evt.to;    // target list

            console.log('==============================================');
            movedTo = $(movedTo).data('parent');
            console.log('Moved to: ' + movedTo);
        }

    });

}
*/









