<?php



if (!empty($_POST['moveFile'])){

//Set user input variable

$fileName = test_input($_POST["fileName"]);
$catName = test_input($_POST["compDir"]);
$newDir = test_input($_POST["newDir"]);


  moveChangeCommentString($catName, $fileName, $newDir);

  moveScssFile($catName, $fileName, $newDir);
  
  deleteScssImportString($catName, $fileName );
  
  writeScssImportFile($newDir, $fileName );
  
  moveCompFile($catName, $fileName, $newDir);
  
  deleteCompIncludetString($catName, $fileName );
  
  createIncludeString($newDir, $fileName );
  
  //moveAjaxFile($catName, $fileName, $newDir);
  
  deleteAjaxCompFile($catName, $fileName);
  
  createAjaxIncludeAndCompFile($newDir, $fileName);
  
  
  header("location: http://127.0.0.1/atomic-docs/atomic-core/$newDir.php");
}


?>