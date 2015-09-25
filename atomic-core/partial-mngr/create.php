<?php



if (!empty($_POST['create'])){

//Set user input variable

$fileName = test_input($_POST["compName"]);
$catName = test_input($_POST["compDir"]);



createScssFile($catName, $fileName );
importScssFile($catName, $fileName );

createCompFile($catName, $fileName );
createIncludeString($catName, $fileName );

}

//header("location:../$catName.php");
?>

