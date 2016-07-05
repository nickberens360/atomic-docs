<?php
global $Atomic;

require_once(Atomic::includePath() . '/inc/lib/Atomic.php');
require_once(Atomic::includePath() . '/inc/lib/fllat.php');

$Atomic = new Atomic();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js atomsWrap"> <!--<![endif]-->
<head>
    <base href="../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" type="text/css" href="atomic-core/css/main.css">

    <link rel="stylesheet" href="atomic-core/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="atomic-core/vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="atomic-core/vendor/jquery-ui/jquery-ui.structure.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>

    <script src="atomic-core/zero/ZeroClipboard.js"></script>


    <script src="atomic-core/js/src-min/ace.js"></script>


    <?php
    $filename = '../atomic-head.php';
    if (file_exists($filename)) {
        include("../atomic-head.php");
    }
    ?>
</head>