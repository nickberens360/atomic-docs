<?php
$comp = $_GET["component"];
$cat = $_GET["category"];
?>
<!Doctype html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $_GET["comp-name"]; ?></title>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Custom css for every snippet. -->

</head>
<!--Add conditional if component not found-->
<body>
    <div class="partial">
      <?php require ('../components/'.$cat.'/'.$comp.'.php'); ?>
    </div>
</body>
