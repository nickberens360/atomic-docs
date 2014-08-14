<?php include 'config.php'; ?>
<?php

//Get file name from user input
$myFile = $_POST["partialName"];
$partialDir = $_POST["partialDir"];



//Create @import string
$myImport ="@import " . '"' . $myFile . '";' ;
//Create file name string
$myFile = "_" . $myFile . ".scss";
//Create file path string
$filePath = "../scss/$partialDir/_$partialDir.scss";
//Place contents of file into variable
$contents = file_get_contents($filePath);
//Remove desired @import string
$contents = str_replace($myImport, "", $contents);
//Write contents back to file
$contents = file_put_contents($filePath, $contents);




$dir = "../scss/$partialDir/";

unlink($dir.$myFile);







//Get file name from user input
$myFile = $_POST["partialName"];
$partialDir = $_POST["partialDir"];
//Create @import string
$myImport = '<span id="'.$myFile.'"></span><div class="component"><?php include ("components/'.$partialDir.'/'.$myFile.'.php"); ?></div>';

							
							


//Create file name string
$myFile = $myFile . ".php";
//Create file path string
$filePath = "../components/_$partialDir.php";
//Place contents of file into variable
$contents = file_get_contents($filePath);



//Remove desired @import string
$contents = str_replace($myImport, "", $contents);
//Write contents back to file
$contents = file_put_contents($filePath, $contents);




$dir = "../components/$partialDir/";

unlink($dir.$myFile);


header("location:index.php");

?>