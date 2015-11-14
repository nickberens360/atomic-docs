<?php


function renameScssFile($catName, $fileName, $oldName)
{	
    rename ("../scss/$catName/_$oldName.scss", "../scss/$catName/_$fileName.scss");
}

function renameCompFile($catName, $fileName, $oldName)
{	
    rename ("../components/$catName/$oldName.php", "../components/$catName/$fileName.php");
}

function changeCommentString($catName, $fileName, $oldName)
{	


    $oldString = '<!--components/'.$catName.'/'.$oldName.'.php-->';
    $newString = '<!--components/'.$catName.'/'.$fileName.'.php-->';

	//Place contents of file into variable
	$contents = file_get_contents('../components/'.$catName.'/'.$oldName.'.php');
	$contents = str_replace($oldString, $newString , $contents);
	$contents = file_put_contents('../components/'.$catName.'/'.$oldName.'.php', $contents);
    

}

	


?>