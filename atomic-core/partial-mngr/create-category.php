<?php
include ("classes/class-category.php");
include ("functions/functions.php");



//Set user input variable
$inputName = $_POST["inputName"];

//initialize object
$category = new category();

//populate objects with post values
$category-> setCategory($inputName);


//createScssCatDirAndFile($category-> getCategory());

//createCompCatDir($category-> getCategory());

createPageTemplate($category-> getCategory());


//createSidebarIncludeAndFile($category-> getCategory());





//header("location:../$inputName.php");
?>