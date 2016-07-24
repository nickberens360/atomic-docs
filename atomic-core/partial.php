<?php
$comp = $_GET["comp-name"];
$cat = $_GET["cat-name"];

?>
<!Doctype html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $_GET["comp-name"]; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Custom css for every snippet. -->
    <style>
        body{
            margin:0;
        }
    </style>

</head>
<!--Add conditional if component not found-->
<body>
    <div class="partial">
      <?php require ('../components/'.$cat.'/'.$comp.'.php'); ?>
    </div>
</body>
