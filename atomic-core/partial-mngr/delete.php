<?php




if (!empty($_POST['delete'])){

//Set user input variable
$fileName = test_input($_POST["compName"]);
$catName = test_input($_POST["compDir"]);



deleteScssImportString($catName, $fileName );
deleteScssFile($catName, $fileName );

deleteCompIncludetString($catName, $fileName );
deleteCompFile($catName, $fileName );

deleteAjaxCompFile($catName, $fileName);

header("location: http://127.0.0.1/atomic-docs/atomic-core/$catName.php");

}

?>