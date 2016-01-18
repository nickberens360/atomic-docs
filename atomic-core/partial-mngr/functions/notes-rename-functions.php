<?php
function changeIncludeString($compDir, $compNotes, $compNotesNew, $fileName)
{	

	$config = getConfig();
	$compExt = $config['compExt'];



    $oldString = '<div class="compWrap"><span id="'.$fileName.'" class="compTitle">'.$fileName.' <span class="js-hideAll fa fa-eye"></span></span><p class="compNotes">'.$compNotes.'</p><div class="component"><?php include("../components/'.$compDir.'/'.$fileName.'.'.$compExt.''.'");?></div></div>';

    $newString = '<div class="compWrap"><span id="'.$fileName.'" class="compTitle">'.$fileName.' <span class="js-hideAll fa fa-eye"></span></span><p class="compNotes">'.$compNotesNew.'</p><div class="component"><?php include("../components/'.$compDir.'/'.$fileName.'.'.$compExt.''.'");?></div></div';

	//Place contents of file into variable
	$contents = file_get_contents('../categories/'.$compDir.'/'.$compDir.'.php');
	$contents = str_replace($oldString, $newString , $contents);
	$contents = file_put_contents('../categories/'.$compDir.'/'.$compDir.'.php', $contents);
    

}
?>