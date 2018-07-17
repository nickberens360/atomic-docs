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


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>


    <!-- Latest Sortable -->
    <script src="//rubaxa.github.io/Sortable/Sortable.js"></script>
    <script src="vendor-js/jquery.js"></script>


</head>

<body>


<div id="simpleList" class="list-group">
    <div class="list-group-item">This is <a href="http://rubaxa.github.io/Sortable/">Sortable</a></div>
    <div class="list-group-item">It works with Bootstrap...</div>
    <div class="list-group-item">...out of the box.</div>
    <div class="list-group-item">It has support for touch devices.</div>
    <div class="list-group-item">Just drag some elements around.</div>
</div>


<script>
    // Simple list


    for (var i = 0; i < $('.list-group').length; i++) {
        Sortable.create(document.getElementsByClassName("list-group")[i], {
            animation: 150,


            onStart: function (evt) {
                var oldIndex = evt.oldIndex;  // element index within parent
                console.log(oldIndex);
            }


        });
    }


    /*Sortable.create(simpleList, {


        onStart: function (/!**Event*!/evt) {
            var oldIndex = evt.oldIndex;  // element index within parent
            console.log(oldIndex);
        }


    });*/


</script>


</body>