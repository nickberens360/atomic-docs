<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="atomic-core/js/src-min/ace.js"></script>
<script src="atomic-core/vendor/zero/ZeroClipboard.js"></script>
<script src="atomic-core/vendor/newSort/jquery.fn.sortable.js"></script>
<script src="atomic-core/js/min/compiled.min.js"></script>

<?php
$cat = $_GET['cat'];
global $cat;
$components = array_filter($components, function($v) {
    global $cat;
    return $v['category'] == $cat;});
foreach ($components as $component) {
    ?>

    
    <script>
        var editormarkup_<?php echo $component['component'] ?> = ace.edit("editor-markup-<?php echo $component['component'] ?>");
        var code = editormarkup_<?php echo $component['component'] ?>.getValue();
        editormarkup_<?php echo $component['component'] ?>.getSession().on('change', function () {
            $("input[name=new-markup-val-<?php echo $component['component'] ?>]").val(editormarkup_<?php echo $component['component'] ?>.getSession().getValue());
        });
        var code = code.replace(/<!--(.*?)-->/g, '');
        var code = code.trim();
        $('#<?php echo $component['component'] ?>-container').find(".copyBtn-markup").attr('data-clipboard-text', code);
        new ZeroClipboard($('.copyBtn-markup'));
        editormarkup_<?php echo $component['component'] ?>.getSession().setMode("ace/mode/html");
        editormarkup_<?php echo $component['component'] ?>.setOptions({
            maxLines: Infinity
        });
        editormarkup_<?php echo $component['component'] ?>.setHighlightActiveLine(false);
        editormarkup_<?php echo $component['component'] ?>.setShowPrintMargin(false);
    </script>
    <script>
        var editorstyles_<?php echo $component['component'] ?> = ace.edit("editor-styles-<?php echo $component['component'] ?>");
        var code = editorstyles_<?php echo $component['component'] ?>.getValue();
        editorstyles_<?php echo $component['component'] ?>.getSession().on('change', function () {
            $("input[name=new-styles-val-<?php echo $component['component'] ?>]").val(editorstyles_<?php echo $component['component'] ?>.getSession().getValue());
        });
        var code = code.replace(/\/\*(.*?)\*\//g, '');
        var code = code.trim();
        $('#<?php echo $component['component'] ?>-container').find(".copyBtn-styles").attr('data-clipboard-text', code);
        new ZeroClipboard($('.copyBtn-styles'));
        editorstyles_<?php echo $component['component'] ?>.getSession().setMode("ace/mode/scss");
        editorstyles_<?php echo $component['component'] ?>.setOptions({
            maxLines: Infinity
        });
        editorstyles_<?php echo $component['component'] ?>.setHighlightActiveLine(false);
        editorstyles_<?php echo $component['component'] ?>.setShowPrintMargin(false);
    </script>



<?php } ?>



</body>
</html>
