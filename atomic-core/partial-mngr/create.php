<?php
include ("classes/class-comp.php");
include ("functions/functions.php");



//Set user input variable
$fileName = $_POST["compName"];
$catName = $_POST["compDir"];

//initialize object
$component = new component();

//populate objects with post values
$component-> setFileName($fileName);
$component-> setCatName($catName);

createScssFile($component->getCatName(), $component->getFileName());
importScssFile($component->getCatName(), $component->getFileName());

createCompFile($component->getCatName(), $component->getFileName());
createIncludeString($component->getCatName(), $component->getFileName());


header("location:../$catName.php");
?>