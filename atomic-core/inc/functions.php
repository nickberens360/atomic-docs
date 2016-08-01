<?php

//
//    require_once '../../atomic-config.php';
//
//	require 'cat-delete-functions.php';
//	require 'cat-create-functions.php';
//	require 'file-create-functions.php';
//	require 'file-delete-functions.php';
//	require 'file-rename-functions.php';
//	require 'file-move-functions.php';
//	require 'notes-rename-functions.php';
//    require 'bgcolor-change-functions.php';
//	require 'validation.php';


function file_force_contents($dir, $contents) {
	$parts = explode('/', $dir);
	$file = array_pop($parts);
	$dir = '';
	foreach ($parts as $part) {
		if (!is_dir($dir .= "/$part")) {
			mkdir($dir, 0755, true);
		}
	}
	file_put_contents("$dir/$file", $contents);
}

?>


