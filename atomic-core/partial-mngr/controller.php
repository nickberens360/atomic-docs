<?php include ("classes/class-component.php");?>
<?php include ("functions/functions.php");?>


<?php
//Set user input variable
$compName = $_POST["compName"];
$compDir = $_POST["compDir"];

//initialize object
$component = new component();

//populate objects with post values
$component-> setNameScss($compName);
$component-> setNameComp($compName);
$component-> setDirName($compDir);
$component-> setDirPathScss($compDir);
$component-> setDirPathComp($compDir);


echo($component->getNameScss());
echo("<br/>");
echo($component->getNameComp());
echo("<br/>");
echo($component->getDirName());
echo("<br/>");
echo($component->getDirPathScss());
echo("<br/>");
echo($component->getDirPathComp());
echo("<br/>");
echo($component->getDirPathScss().'/'.$component->getNameScss());


//Create the scss file and add the css class to that page
createScssFile($component->getDirPathScss(), $component->getNameScss());

//Create the @import string and add it to the parent scss file
importScssFile($component->getDirPathScss(), $component->getNameScss());





?>