<?php include 'config.php'; ?>
<?php

  //CREATES THE MODULE PARTIAL FILE

	$fileName = $_POST["modName"]; //file name
	$partialDir = $_POST["partialDir"]; //directory name
	$path = $_POST["path"]; //directory path
	
	$ourFileName = "$path/_$fileName.scss";
	$ourFileHandle = fopen($ourFileName, 'x+') or die("can't open file");
	fwrite($ourFileHandle, ".".$fileName."{\n\n}");
	fclose($ourFileHandle);
	
	

	
	//WRITES TO THE MODULES SCSS FILE
	$importName = "@import " . '"' . $fileName . '";' ;
	$myFile = "$path/_$partialDir.scss";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = "\n$importName\n";
	
	fwrite($fh, $stringData);               
	fclose($fh);  
	file_put_contents($myFile, implode(PHP_EOL, file($myFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));










	//COMPONENT FILE CREATION
	$fileName = $_POST["modName"]; //file name
	$partialDir = $_POST["partialDir"]; //directory name
	$path = $_POST["compPath"]; //directory path
	
	$ourFileName = "$path/$fileName.php";
	$ourFileHandle = fopen($ourFileName, 'x+') or die("can't open file");
	fwrite($ourFileHandle, '');
	fclose($ourFileHandle);

	//WRITES TO THE COMPONET PHP FILE
		
	$importName =  '<span id="'.$fileName.'"></span><div class="component"><?php include ("components/'.$partialDir.'/'.$fileName.'.php"); ?></div>';
								 
								  
										
									
	
	//$myFile = "../$partialDir.php";
	
	$myFile = "$compRootPath/_$partialDir.php";
	
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = "\n$importName\n";
	
	fwrite($fh, $stringData);               
	fclose($fh);  
	file_put_contents($myFile, implode(PHP_EOL, file($myFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));



	header("location:index.php");
?>	






