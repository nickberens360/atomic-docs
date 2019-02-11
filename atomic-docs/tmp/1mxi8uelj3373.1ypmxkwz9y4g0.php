<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <base href="../">

    <link href="<?= $appBase ?>/../css/main.css" rel="stylesheet">


    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
        }

        #partial {
            position: relative;
            float: left;
            width: 100%;
        }
    </style>
</head>
<!--Add conditional if component not found-->
<body>


<div id="partial" class="partial" onload="javascript: getHeight(this);">
    <?= incFilter($component->compFile($component, 'markup')).PHP_EOL ?>
</div>


<script>


    var e = document.getElementById('partial');
    var elementHeight = e.clientHeight;
    parent.postMessage({
        element: 'component-<?= $component->slug() ?>',
        elementHeight: elementHeight
    })

</script>

<script src="<?= $appBase ?>/../js/min/site.min.js"></script>

</body>
</html>