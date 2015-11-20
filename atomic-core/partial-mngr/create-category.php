<?php


/*require 'functions/functions.php';


$inputName = test_input($_POST["inputName"]);*/



/*createPageIncludeFile($inputName );

createScssCatDirAndFile($inputName );

createStringForMainScssFile($inputName );

createCompCatDir($inputName );*/

/*createPageTemplate($inputName );


createSidebarIncludeAndFile($inputName );

createAjaxIncludeAndFile($inputName);*/




//createAjaxFile($inputName);

//header("location:../$inputName.php");


?>

<?php
require 'functions/functions.php';
if (!empty($_POST['inputName']))
{
  //$inputName = test_input($_POST["inputName"]);
//  createCompCatDir($inputName );
   echo "true"; 
}
else
{
    echo "false"; 
}
?>




