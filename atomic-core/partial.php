<?php
$comp = $_GET["component"];
$cat = $_GET["category"];

require "fllat.php";


$settings = new Fllat("settings", "../atomic-db");


$settings = $settings->select(array());

$compExt = $settings[0]['component_extension'];
$compDir = $settings[0]['component_directory'];

?>
<!Doctype html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $_GET["comp-name"]; ?></title>
    <base href="../" >
    <link rel="stylesheet" href="css/main.css">
    <!--<script src="js/<?php /*echo $comp; */?>.js"></script>-->


    <style>
        body{
            margin:0;
        }
    </style>

</head>
<!--Add conditional if component not found-->
<body>
    <div class="partial">
      <?php require ('../'.$compDir.'/'.$cat.'/'.$comp.'.'.$compExt.''); ?>
    </div>
</body>
