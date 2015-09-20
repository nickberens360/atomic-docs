<?php



if (!empty($_POST['create'])){

//Set user input variable
$fileName = $_POST["compName"];
$catName = $_POST["compDir"];



createScssFile($catName, $fileName );
importScssFile($catName, $fileName );

createCompFile($catName, $fileName );
createIncludeString($catName, $fileName );

}

//header("location:../$catName.php");
?>

