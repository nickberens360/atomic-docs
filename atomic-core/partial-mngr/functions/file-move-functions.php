<?php

function moveScssFile($catName, $fileName, $newDir)
{	
    rename ("../../scss/$catName/_$fileName.scss", "../../scss/$newDir/_$fileName.scss");
}




function moveCompFile($catName, $fileName, $newDir)
{	
    rename ("../../components/$catName/$fileName.php", "../../components/$newDir/$fileName.php");
}

function moveAjaxFile($catName, $fileName, $newDir)
{	
    rename ("../actions/$catName/_ajaxComp-$fileName.php", "../actions/$newDir/_ajaxComp-$fileName.php");
}


function moveChangeCommentString($catName, $fileName, $newDir)
{	


    $oldString = '<!--components/'.$catName.'/'.$fileName.'.php-->';
    $newString = '<!--components/'.$newDir.'/'.$fileName.'.php-->';

	//Place contents of file into variable
	$contents = file_get_contents('../../components/'.$catName.'/'.$fileName.'.php');
	$contents = str_replace($oldString, $newString , $contents);
	$contents = file_put_contents('../../components/'.$catName.'/'.$fileName.'.php', $contents);
    

}



?>
