<?php
function changeIncludeString($compDir, $compNotes, $compNotesNew, $fileName)
{	

	$config = getConfig();
	$compExt = $config['compExt'];



    $oldString = '<span id="'.$fileName.'" class="compTitle">'.$fileName.'</span><p class="compNotes">'.$compNotes.'</p><div class="component"><?php include("../components/'.$compDir.'/'.$fileName.'.'.$compExt.''.'");?></div>';

    $newString = '<span id="'.$fileName.'" class="compTitle">'.$fileName.'</span><p class="compNotes">'.$compNotesNew.'</p><div class="component"><?php include("../components/'.$compDir.'/'.$fileName.'.'.$compExt.''.'");?></div>';

	//Place contents of file into variable
	$contents = file_get_contents('../categories/'.$compDir.'/'.$compDir.'.php');
	$contents = str_replace($oldString, $newString , $contents);
	$contents = file_put_contents('../categories/'.$compDir.'/'.$compDir.'.php', $contents);
    

}
?>
