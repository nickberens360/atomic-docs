<?php



function deleteScssImportString($catName, $fileName)
{

  $config = getConfig();
  $cssDir = $config['cssDir'];
  $cssExt = $config['cssExt'];

	$importString = "@import " . '"' . $fileName . '";' ;
	//Place contents of file into variable
	$contents = file_get_contents('../../'.$cssDir.'/'.$catName.'/_'.$catName.'.'.$cssExt.'');
	$contents = str_replace($importString, "", $contents);
	$contents = file_put_contents('../../'.$cssDir.'/'.$catName.'/_'.$catName.'.'.$cssExt.'', $contents);
}


function deleteScssFile($catName, $fileName)
{        
	$config = getConfig();
	$cssDir = $config['cssDir'];
    $cssExt = $config['cssExt'];

	unlink('../../'.$cssDir.'/'.$catName.'/_'.$fileName.'.'.$cssExt.'');
}



function deleteCompIncludetString($catName, $compNotes, $fileName)
{
	$config = getConfig();
    $compExt = $config['compExt'];

	//create @import string
	$includeString = '<div class="compWrap"><span id="'.$fileName.'" class="compTitle">'.$fileName.' <span class="js-hideAll fa fa-eye"></span></span><p class="compNotes">'.$compNotes.'</p><div class="component"><?php include("../components/'.$catName.'/'.$fileName.'.'.$compExt.''.'");?></div></div>';

  
 
  

	//Place contents of file into variable
	$contents = file_get_contents('../categories/'.$catName.'/'.$catName.'.php');
	
	$contents = str_replace($includeString, "", $contents);
	$contents = file_put_contents('../categories/'.$catName.'/'.$catName.'.php', $contents);
}


function deleteCompFile($catName, $fileName)
{
	$config = getConfig();
    $compExt = $config['compExt'];

	unlink('../../components/'.$catName.'/'.$fileName.'.'.$compExt.'');
}



function deleteAjaxCompFile($catName, $fileName)
{
	unlink('../categories/'.$catName.'/form-'.$fileName.'.php');
}

?>