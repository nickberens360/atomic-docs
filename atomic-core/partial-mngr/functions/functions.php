<?php

function createScssFile($scssPath, $scssFile)
{
  $fileHandle = fopen($scssPath.'/'.'_'.$scssFile, 'x+') or die("can't open file");
	fwrite($fileHandle, ".".$scssFile."{\n\n}");
	fclose($fileHandle);
}

function importScssFile($scssPath, $scssFile, $scssParentFile)
{
	$scssFile = pathinfo($scssFile);
	$scssFile = $scssFile['filename'];
	$importString = "\n@import " . '"' . $scssFile . '";' ;
	$fileHandle = fopen($scssPath.'/'.'_'.$scssParentFile.'.scss', 'a') or die("can't open file");
	fwrite($fileHandle, $importString);
	fclose($fileHandle);
	
	//file_put_contents($fileHandle, implode(PHP_EOL, file($fileHandle, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}


        
	  
	


?>