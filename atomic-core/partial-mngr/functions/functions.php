<?php

function createScssFile($scssPath, $scssFile)
{
  $fileHandle = fopen($scssPath.'/'.'_'.$scssFile, 'x+') or die("can't open file");
	fwrite($fileHandle, ".".$scssFile."{\n\n}");
	fclose($fileHandle);
}

function importScssFile($scssPath, $scssFile, $scssParentFile)
{
	//remove file extension for @import string
	$scssFile = pathinfo($scssFile);
	$scssFile = $scssFile['filename'];
	
	//create @import string
	$importString = "@import " . '"' . $scssFile . '";' ;
	$importString = "\n$importString\n";
	
	//open parent scss file and write @import string to it
	$fileHandle = fopen($scssPath.'/'.'_'.$scssParentFile.'.scss', 'a') or die("can't open file");
	fwrite($fileHandle, $importString);
  fclose($fileHandle);   
	
	//remove any extra line breaks from file
	file_put_contents($scssPath.'/'.'_'.$scssParentFile.'.scss', implode(PHP_EOL, file($scssPath.'/'.'_'.$scssParentFile.'.scss', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));       
}

function createCompFile($compPath, $compFile)
{
  $fileHandle = fopen($compPath.'/'.$compFile, 'x+') or die("can't open file");
	fclose($fileHandle);
}





?>