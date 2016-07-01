<?php
require "fllat.php";
require "../atomic-config.php";


$config = getConfig();
$dbPath = $config['dbPath'];
if(!$dbPath){
  $dbPath = "db";
}


$compdb = new Fllat("compdb",$dbPath);

$comp_data = $compdb->where(array(),"comp_name", $_GET["comp-name"]);




?>

<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $_GET["comp-name"]; ?></title>

    <link rel="stylesheet" href="css/main.css">

		<link rel="stylesheet" type="text/css" href="../css/main.css">

    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">

    <!-- Custom css for every snippet. -->
    <style type="text/css">
        body, html { overflow: hidden}
        #patialr { padding: 1px 0}
    </style>

    <!-- Insert your CSS resources here. -->
</head>


<?php if(!empty($comp_data) && !empty($comp_data[1]['comp_markup_path'])) { ?>
<body style="background-color:<?php echo $comp_data[1]['comp_context_color'] ?>">



    <div id="partial">
      <?php require $comp_data[1]['comp_markup_path']; ?>

     <?php var_dump($comp_data);?>

    </div>
</body>

<?php } else { ?>
  <body>
    Partial not found
  </body>
<?php } ?>
