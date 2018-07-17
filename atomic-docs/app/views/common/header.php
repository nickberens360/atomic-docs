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



    <title><?= $title ?></title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= Base::instance()->get('BASE') ?>/css/main.css" rel="stylesheet">
    <link href="<?= Base::instance()->get('BASE') ?>/../css/main.css" rel="stylesheet">

    <!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css"/>-->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!--<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>-->

    <script src="https://use.fontawesome.com/f13dbf90b6.js"></script>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">




    <script src="//rubaxa.github.io/Sortable/Sortable.js"></script>

    <script>
        var ajax_url = 'something';
        var cat_name = '<?= $catName ?>';
        var cat_id = '<?= $catID ?>';
    </script>





</head>

<?php
$f3 = Base::instance();

$option = OptionService::get();

$sidebar = $option->sidebar;

?>

<?php if ($sidebar == 1) { ?>

<body class="atomic-dash-is-active">

<?php } else { ?>
<body>
<?php } ?>


