<?php



function deleteScssImportString($catName, $fileName)
{

	$importString = "@import " . '"' . $fileName . '";' ;
	//Place contents of file into variable
	$contents = file_get_contents('../../scss/'.$catName.'/_'.$catName.'.scss');
	$contents = str_replace($importString, "", $contents);
	$contents = file_put_contents('../../scss/'.$catName.'/_'.$catName.'.scss', $contents);
}


function deleteScssFile($catName, $fileName)
{        
	unlink('../../scss/'.$catName.'/_'.$fileName.'.scss');
}



function deleteCompIncludetString($catName, $fileName)
{
	
	//create @import string
	$includeString = '<span id="'.$fileName.'" class="compTitle">'.$fileName.'</span><div class="component"><?php include("../components/'.$catName.'/'.$fileName.'.php");?></div>';
	//Place contents of file into variable
	$contents = file_get_contents('../categories/'.$catName.'/'.$catName.'.php');
	
	$contents = str_replace($includeString, "", $contents);
	$contents = file_put_contents('../categories/'.$catName.'/'.$catName.'.php', $contents);
}


function deleteCompFile($catName, $fileName)
{
	unlink('../../components/'.$catName.'/'.$fileName.'.php');
}



function deleteAjaxCompFile($catName, $fileName)
{
	unlink('../categories/'.$catName.'/form-'.$fileName.'.php');
}

?>