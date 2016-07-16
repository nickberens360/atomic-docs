<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $_GET["comp-name"]; ?></title>

    <!--<link rel="stylesheet" href="css/main.css">-->

    <link rel="stylesheet" type="text/css" href="../src/css/main.css">

    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">

    <!-- Custom css for every snippet. -->
    <style type="text/css">
        body, html {
            overflow: hidden
        }

        #patialr {
            padding: 1px 0
        }
    </style>

    <!-- Insert your CSS resources here. -->
</head>


<?php if (!empty($_GET["comp-name"]) && !empty($_GET["cat-name"])) { ?>
    <body>


    <div class="partial">
        <?php require('../src/components/' . $_GET["cat-name"] . '/' . $_GET["comp-name"] . '.php') ?>

    </div>
    </body>

<?php } else { ?>
    <body>
    Partial not found
    </body>
<?php } ?>