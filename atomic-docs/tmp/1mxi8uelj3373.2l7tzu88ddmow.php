<script src="<?= $appBase ?>/vendor-js/jquery.js"></script>
<script src="<?= $appBase ?>/vendor-js/ace-editor/src-min/ace.js"></script>


<!-- include summernote css/js -->
<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>


<script src="<?= $appBase ?>/js/min/site.min.js"></script>






<!--<script>





<?php foreach (($catComponents?:[]) as $comp): ?>



        initializeComp(<?= $comp->componentId() ?>, <?= $comp->hasJs() ?>);




<?php endforeach; ?>


</script>-->



<!--<script>
    var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

    // Listen to message from child window
    eventer(messageEvent,function(e) {

        var thisEl = '.' + e.data.element;
        $(thisEl).height(e.data.elementHeight);
    },false)

</script>-->















