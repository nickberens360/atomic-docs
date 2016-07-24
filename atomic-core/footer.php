<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="atomic-core/js/src-min/ace.js"></script>
<script src="atomic-core/vendor/zero/ZeroClipboard.js"></script>
<script src="atomic-core/vendor/newSort/jquery.fn.sortable.js"></script>
<script src="atomic-core/js/min/compiled.min.js"></script>


<?php
$cat = $_GET['cat'];
global $cat;
$comp_data = array_filter($comp_data, function($v) {
    global $cat;
    return $v['comp_category'] == $cat;});
foreach ($comp_data as $comp_value) {
    ?>

    
    <script>
        var editormarkup_<?php echo $comp_value['comp_name'] ?> = ace.edit("editor-markup-<?php echo $comp_value['comp_name'] ?>");
        var code = editormarkup_<?php echo $comp_value['comp_name'] ?>.getValue();
        editormarkup_<?php echo $comp_value['comp_name'] ?>.getSession().on('change', function () {
            $("input[name=new-markup-val-<?php echo $comp_value['comp_name'] ?>]").val(editormarkup_<?php echo $comp_value['comp_name'] ?>.getSession().getValue());
        });
        var code = code.replace(/<!--(.*?)-->/g, '');
        var code = code.trim();
        $('#<?php echo $comp_value['comp_name'] ?>-container').find(".copyBtn-markup").attr('data-clipboard-text', code);
        new ZeroClipboard($('.copyBtn-markup'));
        editormarkup_<?php echo $comp_value['comp_name'] ?>.getSession().setMode("ace/mode/html");
        editormarkup_<?php echo $comp_value['comp_name'] ?>.setOptions({
            maxLines: Infinity
        });
        editormarkup_<?php echo $comp_value['comp_name'] ?>.setHighlightActiveLine(false);
        editormarkup_<?php echo $comp_value['comp_name'] ?>.setShowPrintMargin(false);
    </script>
    <script>
        var editorstyles_<?php echo $comp_value['comp_name'] ?> = ace.edit("editor-styles-<?php echo $comp_value['comp_name'] ?>");
        var code = editorstyles_<?php echo $comp_value['comp_name'] ?>.getValue();
        editorstyles_<?php echo $comp_value['comp_name'] ?>.getSession().on('change', function () {
            $("input[name=new-styles-val-<?php echo $comp_value['comp_name'] ?>]").val(editorstyles_<?php echo $comp_value['comp_name'] ?>.getSession().getValue());
        });
        var code = code.replace(/\/\*(.*?)\*\//g, '');
        var code = code.trim();
        $('#<?php echo $comp_value['comp_name'] ?>-container').find(".copyBtn-styles").attr('data-clipboard-text', code);
        new ZeroClipboard($('.copyBtn-styles'));
        editorstyles_<?php echo $comp_value['comp_name'] ?>.getSession().setMode("ace/mode/scss");
        editorstyles_<?php echo $comp_value['comp_name'] ?>.setOptions({
            maxLines: Infinity
        });
        editorstyles_<?php echo $comp_value['comp_name'] ?>.setHighlightActiveLine(false);
        editorstyles_<?php echo $comp_value['comp_name'] ?>.setShowPrintMargin(false);
    </script>



<?php } ?>



</body>
</html>
