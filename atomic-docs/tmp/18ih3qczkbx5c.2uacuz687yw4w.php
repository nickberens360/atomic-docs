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



    <title><?= ($title) ?></title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= ($appBase) ?>/css/main.css" rel="stylesheet">


    <script src="https://use.fontawesome.com/f13dbf90b6.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <script src="/atomic-docs/vendor-js/sortable.js"></script>

    <script>
        var ajax_url = 'something';
        var cat_name = '<?= ($catID) ?>';
        var cat_id = '<?= ($catName) ?>';
    </script>





</head>


<?php if ($sideBarOpen=='1'): ?>
    <body class="atomic-dash-is-active">
    <?php else: ?><body>
<?php endif; ?>


