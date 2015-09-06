<?php
include ("classes/class-category.php");
include ("functions/cat-delete-functions.php");



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



deleteScssImportString($category-> getCategory());


deleteScssDir($category-> getCategory());















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









//header("location:../atoms.php");
?>