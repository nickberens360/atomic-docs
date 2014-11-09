<?php
include ("classes/class-comp.php");
include ("functions/functions.php");
include ("functions/validation.php");



// define variables and set to empty values
$nameErr = "";
$fileName = $catName= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	 if (empty($_POST["compName"])) {
	    $nameErr = "Name is required";
	  } else {
	    $fileName = test_input($_POST["compName"]);
	  }



  
  $catName = test_input($_POST["compDir"]);
}






//Set user input variable
// $fileName = $_POST["compName"];
// $catName = $_POST["compDir"];

//initialize object
$component = new component();

//populate objects with post values
$component-> setFileName($fileName);
$component-> setCatName($catName);

createScssFile($component->getCatName(), $component->getFileName());
//importScssFile($component->getCatName(), $component->getFileName());

//createCompFile($component->getCatName(), $component->getFileName());
//createIncludeString($component->getCatName(), $component->getFileName());


//header("location:../$catName.php");
?>