<?php


if (!empty($_POST['deleteDir'])){

//Set user input variable
$inputName = $_POST["inputName"];

//initialize object
$category = new category();

//populate objects with post values
$category-> setCategory($inputName);




deleteSidebarIncludeString($category-> getCategory());

deleteCatPageFile($category-> getCategory());

deleteCatSidebarIncludeFile($category-> getCategory());

deleteCompDir($category-> getCategory());



deleteCatScssImportString($category-> getCategory());


deleteScssDir($category-> getCategory());

header("location:index.php");

}



?>

