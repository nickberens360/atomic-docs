<?php include ("classes/class-comp.php");?>
<?php include ("functions/functions.php");?>


<?php
//Set user input variable
$fileName = $_POST["compName"];
$catName = $_POST["compDir"];

//initialize object
$component = new component();

//populate objects with post values
$component-> setFileName($fileName);
$component-> setCatName($catName);





//createScssFile($component->getCatName(), $component->getFileName());
//
//
//importScssFile($component->getCatName(), $component->getFileName());
//
//
//createCompFile($component->getCatName(), $component->getFileName());

createIncludeString($component->getCatName(), $component->getFileName());






























//echo($component->getNameScss());
//echo("<br/>");
//echo($component->getNameComp());
//echo("<br/>");
//echo($component->getDirName());
//echo("<br/>");
//echo($component->getDirPathScss());
//echo("<br/>");
//echo($component->getDirPathComp());
//echo("<br/>");
//echo($component->getDirPathScss().'/'.$component->getNameScss());


//Create the scss file and add the css class to that page
//createScssFile($component->getDirPathScss(), $component->getNameScss());

//Create the @import string and add it to the parent scss file
//importScssFile($component->getDirPathScss(), $component->getNameScss(), $component->getDirName());

//Create the comp file 
//createCompFile($component->getDirPathComp(), $component->getNameComp());



?>