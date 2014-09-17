<?php
include ("classes/class-category.php");
include ("functions/cat-delete-functions.php");



//Set user input variable
$inputName = $_POST["inputName"];

//initialize object
$category = new category();

//populate objects with post values
$category-> setCategory($inputName);





//deleteSidebarIncludeString($category-> getCategory());

//deleteCatPageFile($category-> getCategory());

deleteCatIncludeFile($category-> getCategory());
















//createScssCatDirAndFile($category-> getCategory());
//
//createStringForMainScssFile($category-> getCategory());
//
//createCompCatDir($category-> getCategory());
//
//createPageTemplate($category-> getCategory());
//
//
//createSidebarIncludeAndFile($category-> getCategory());









//header("location:../$inputName.php");
?>