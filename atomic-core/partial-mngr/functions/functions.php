<?php

//helper functions
function scssPath($catName)
{
	$path = '../../scss/'.$catName;
	return $path;
}
function scssFullFile($fileName)
{
	$fullFile = '_'.$fileName.'.scss';
	return $fullFile;
}

function compPath($catName)
{
	$path = '../../components/'.$catName;
	return $path;
}
function compFullFile($fileName)
{
	$fullFile = $fileName.'.php';
	return $fullFile;
}



function createScssFile($catName, $fileName)
{
	$path = scssPath($catName);
	$fullFile = scssFullFile($fileName);
	
  $fileHandle = fopen($path.'/'.$fullFile, 'x+') or die("can't open file");
	fwrite($fileHandle, ".".$fileName."{\n\n}");
	fclose($fileHandle);
}


function importScssFile($catName, $fileName)
{
	
	//create @import string
	$importString = "@import " . '"' . $fileName . '";' ;
	$importString = "\n$importString\n";
	
	//open parent scss file and write @import string to it
	$path = scssPath($catName);
	$fileHandle = fopen($path.'/'.'_'.$catName.'.scss', 'a') or die("can't open file");
	fwrite($fileHandle, $importString);
  fclose($fileHandle);   
	
	//remove any extra line breaks from file
	file_put_contents($path.'/'.'_'.$catName.'.scss', implode(PHP_EOL, file($path.'/'.'_'.$catName.'.scss', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));       
}


//creates component file
function createCompFile($catName, $fileName)
{
	$path = compPath($catName);
	$fullFile = compFullFile($fileName);
	
  $fileHandle = fopen($path.'/'.$fullFile, 'x+') or die("can't open file");
	fclose($fileHandle);
}






?>