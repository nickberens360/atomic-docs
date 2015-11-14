<?php



if (!empty($_POST['moveFile'])){


  $fileName = test_input($_POST["fileName"]);
  $catName = test_input($_POST["compDir"]);
  $newDir = test_input($_POST["newDir"]);


 /* $filename = '../components/'.$newDir.'/'.$fileName.'.php';

  if (file_exists($filename)) {
      echo "The file $filename exists";
  } else {
      echo "The file $filename does not exist";*/


    moveChangeCommentString($catName, $fileName, $newDir);

    moveScssFile($catName, $fileName, $newDir);
    
    deleteScssImportString($catName, $fileName );
    
    writeScssImportFile($newDir, $fileName );
    
    moveCompFile($catName, $fileName, $newDir);
    
    deleteCompIncludetString($catName, $fileName );
    
    createIncludeString($newDir, $fileName );
    
    deleteAjaxCompFile($catName, $fileName);
    
    createAjaxIncludeAndCompFile($newDir, $fileName);
    
    
    header("location: http://127.0.0.1/atomic-docs/atomic-core/$newDir.php");

  }


?>