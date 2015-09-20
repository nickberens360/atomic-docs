<?php
/*include ("classes/class-category.php");
include ("functions/functions.php");*/



if (!empty($_POST['createDir'])){

//Set user input variable
$inputName = $_POST["inputName"];

//initialize object
$category = new category();

//populate objects with post values
$category-> setCategory($inputName);



createPageIncludeFile($category-> getCategory());

createScssCatDirAndFile($category-> getCategory());

createStringForMainScssFile($category-> getCategory());

createCompCatDir($category-> getCategory());

createPageTemplate($category-> getCategory());


createSidebarIncludeAndFile($category-> getCategory());



}




?>