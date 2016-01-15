<?php
function changeIncludeString($compDir, $compNotes, $compNotesNew, $fileName)
{	

	$config = getConfig();
	$compExt = $config['compExt'];



    $oldString = '<div class="component"><span id="'.$fileName.'" class="compTitle">'.$fileName.' <span class="js-hideAll fa fa-eye"></span></span><p class="compNotes">'.$compNotes.'</p><?php include("../components/'.$compDir.'/'.$fileName.'.'.$compExt.''.'");?></div>';

    $newString = '<div class="component"><span id="'.$fileName.'" class="compTitle">'.$fileName.' <span class="js-hideAll fa fa-eye"></span></span><p class="compNotes">'.$compNotesNew.'</p><?php include("../components/'.$compDir.'/'.$fileName.'.'.$compExt.''.'");?></div>';

	//Place contents of file into variable
	$contents = file_get_contents('../categories/'.$compDir.'/'.$compDir.'.php');
	$contents = str_replace($oldString, $newString , $contents);
	$contents = file_put_contents('../categories/'.$compDir.'/'.$compDir.'.php', $contents);
    

}
?>
