<?php
/*include ("classes/class-category.php");
include ("functions/functions.php");*/



if (!empty($_POST['createDir'])){

//Set user input variable
$inputName = $_POST["inputName"];



createPageIncludeFile($inputName );

createScssCatDirAndFile($inputName );

createStringForMainScssFile($inputName );

createCompCatDir($inputName );

createPageTemplate($inputName );


createSidebarIncludeAndFile($inputName );

header("location:$inputName.php");

}




?>