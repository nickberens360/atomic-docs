<script src="<?= Base::instance()->get('BASE') ?>/vendor-js/jquery.js"></script>
<script src="<?= Base::instance()->get('BASE') ?>/vendor-js/ace-editor/src-min/ace.js"></script>
<!--<script src="/vendor-js/newSort/jquery.fn.sortable.js"></script>-->




<script src="<?= Base::instance()->get('BASE') ?>/js/min/site.min.js"></script>




<?php

$f3 = \Base::instance();






foreach ( $f3->get('catComponents') as $comp ) { ?>

        <script>

            //MARKUP EDITOR

            var myEditormarkup = ace.edit("atomic-editor-markup-<?= $comp->componentId ?>");
            setupEditorMarkup(myEditormarkup, <?= $comp->componentId ?>);


            //STYLES EDITOR

            var myEditorstyles = ace.edit("atomic-editor-styles-<?= $comp->componentId ?>");
            setupEditorStyles(myEditorstyles, <?= $comp->componentId ?>);



            <?php if ($comp->hasJs === !null) { ?>
                var myEditorjs = ace.edit("atomic-editor-js-<?= $comp->componentId ?>");
                setupEditorJs(myEditorjs, <?= $comp->componentId ?>);
            <?php } else { ?>


            <?php } ?>



        </script>

<?php } ?>

<script>









    /*for (var i = 0; i < $('.list-group').length; i++) {
        Sortable.create(document.getElementsByClassName("list-group")[i], {
            animation: 150,


            onStart: function (evt) {
                var oldIndex = evt.oldIndex;  // element index within parent
                console.log(oldIndex);
            }


        });
    }*/



</script>

<!--<script>

    $(".atomic-dirBox__list").sortable({
        group: "atomic-dirBox__list",
        onAdd: function (/**Event*/evt) {
            console.log('ended');
        },
        onStart: function (/**Event*/evt) {
             var oldIndex =  evt.oldIndex;
             console.log(oldIndex);
        },
    });

    $(".atomic-dirBoxGroup ").sortable({
        handle: ".atomic-dirBox__dir-handle"
    });

</script>-->


