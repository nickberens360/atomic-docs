<?php

function createScssFile($scssPath, $scssFile)
{
  $fileHandle = fopen($scssPath.'/'.'_'.$scssFile, 'x+') or die("can't open file");
	fwrite($fileHandle, ".".$scssFile."{\n\n}");
	fclose($fileHandle);
}

function importScssFile($scssPath, $scssFile)
{
	$importString = "@import " . '"' . $scssFile . '";' ;
	
}




?>