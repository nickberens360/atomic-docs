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

deleteScssImportString($component->getCatName(), $component->getFileName());
deleteScssFile($component->getCatName(), $component->getFileName());

deleteCompIncludetString($component->getCatName(), $component->getFileName());
deleteCompFile($component->getCatName(), $component->getFileName());



header("location:../$catName.php");
?>