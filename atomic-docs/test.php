<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>JumpOff</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/main.css" rel="stylesheet">

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <script src="https://use.fontawesome.com/f13dbf90b6.js"></script>


	<?php include( "atomic-head.php" ); ?>

	<?php include 'functions.php';


    $f3 = require( 'fatfree/lib/base.php' );


    $f3->config( 'config.ini' );
    $f3->config( 'routes.ini' );


    $f3->run();


    ?>


	<?php

	/*$f3 = require('fatfree/lib/base.php');


	$f3->set('DB', new DB\SQL('sqlite:../atomic-db/db/atomicdocs.db'));



	$f3->get('DB')->exec('SELECT name FROM component');*/


	/*$db = new PDO('sqlite:../atomic-db/db/atomicdocs.db');

	$result = $db->query('SELECT * FROM component');*/


	?>


</head>

<body>


<?php


var_dump( $results );

/*foreach($result as $row){
	print "<p>".$row['name']."</p>";

}*/


?>


<?php include( "atomic-foot.php" ); ?>


<?php include 'includes/footer-js.php' ?>


</body>