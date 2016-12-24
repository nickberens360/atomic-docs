<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>

    <?php include("atomic-head.php"); ?>

    <style>
        html, body {
            height: 100%;
        }

        .indexBlock {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            max-width: 900px;;
            margin: auto;
        }

        img {
            max-width: 100%;

        }
        .shadow{
            box-shadow: 0px 0px 32px 4px rgba(0, 0, 0, 0.25);
        }

        p {
            font-family: sans-serif;
        }

        a {
            color: #4BC6EF;
            font-weight:bold;
        }
        .logo{
            display: inline-block;
            margin-bottom: 61px;
        }

    </style>

</head>

<body>

<span class="click">Click me!!!</span>


<div class="indexBlock">

    <img class="logo" src="http://atomicdocs.io/img/atomic-logo.svg">

    <p>By default, Atomic Docs is set up for Sass. If you are using Less or Sass check out this <a href="http://atomicdocs.io/docs/less-stylus">post</a>.</p>

    <p>Set up in your php local environment and configure your preprocessor and start
        <a href="atomic-core/?cat=readme">here</a>.</p>

    <p>This GIF pretty much explains what to do after that. Otherwise you can checkout
        this <a href="https://www.youtube.com/watch?v=e8LjP6ynryQ" target="_blank">video</a>.</p><br/>
    <img class="shadow" src="http://atomicdocs.io/img/demo1.gif"/>

</div>
</body>

<?php include("atomic-foot.php"); ?>

</html>



