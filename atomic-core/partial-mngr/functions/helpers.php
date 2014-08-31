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
?>