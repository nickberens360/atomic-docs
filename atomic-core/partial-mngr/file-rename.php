<?php



if (!empty($_POST['rename'])){

//Set user input variable

$fileName = test_input($_POST["compName"]);
$catName = test_input($_POST["compDir"]);
$oldName = test_input($_POST["oldName"]);






    getScssFileContents($catName, $fileName, $oldName );


	deleteScssImportString($catName, $oldName );

	importScssFile($catName, $fileName );

	getCompFileContents($catName, $fileName, $oldName);

	deleteCompIncludetString($catName, $oldName );

	createIncludeString($catName, $fileName );

    deleteAjaxCompFile($catName, $oldName);

    createAjaxIncludeAndCompFile($catName, $fileName);

    header("location: http://127.0.0.1/atomic-docs/atomic-core/$catName.php");
}


?>