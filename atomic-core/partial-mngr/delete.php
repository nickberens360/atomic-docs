<?php




if (!empty($_POST['delete'])){

//Set user input variable
$fileName = test_input($_POST["compName"]);
$catName = test_input($_POST["compDir"]);



deleteScssImportString($catName, $fileName );
deleteScssFile($catName, $fileName );

deleteCompIncludetString($catName, $fileName );
deleteCompFile($catName, $fileName );

deleteAjaxCompFile($fileName);

//header("location:../$catName.php");

}

?>