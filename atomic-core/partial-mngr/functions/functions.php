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


//creates include string and writes to component parent file
function createIncludeString($catName, $fileName)
{
	$fullFile = compFullFile($fileName);
	$includeString = '<span id="'.$fileName.'"></span><div class="component"><?php include("../components/'.$catName.'/'.$fullFile.'");?></div>';
	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('../_'.$catName.'.php', 'a') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('../_'.$catName.'.php', implode(PHP_EOL, file('../_'.$catName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}




function deleteScssImportString($catName, $fileName)
{
	$path = scssPath($catName);
	$fullFile = scssFullFile($fileName);
	//create @import string
	$importString = "@import " . '"' . $fileName . '";' ;
	//Place contents of file into variable
	$contents = file_get_contents($path.'/_'.$catName.'.scss');
	$contents = str_replace($importString, "", $contents);
	$contents = file_put_contents($path.'/_'.$catName.'.scss', $contents);
}


function deleteScssFile($catName, $fileName)
{
	$path = scssPath($catName);
	$fullFile = scssFullFile($fileName);
	$fullFile = '/'.$fullFile;
	unlink($path.$fullFile);
}




function deleteCompIncludetString($catName, $fileName)
{
	$path = compPath($catName);
	$fullFile = compFullFile($fileName);
	
	//create @import string
	$includeString = '<span id="'.$fileName.'"></span><div class="component"><?php include("../components/'.$catName.'/'.$fullFile.'");?></div>';
	//Place contents of file into variable
	$contents = file_get_contents('../_'.$catName.'.php');
	
	$contents = str_replace($includeString, "", $contents);
	$contents = file_put_contents('../_'.$catName.'.php', $contents);
}


function deleteCompFile($catName, $fileName)
{
	$path = compPath($catName);
	$fullFile = compFullFile($fileName);
	$fullFile = '/'.$fullFile;
	unlink($path.$fullFile);
}

?>