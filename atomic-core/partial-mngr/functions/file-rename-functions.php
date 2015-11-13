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
    //$oldString = '<!--components/'.$catName.'/'.$oldName.'.php-->';
//    $newString = '<!--components/'.$catName.'/'.$fileName.'.php-->';
//    
//    
//    
//    $path_to_file = '../components/'.$catName.'/'.$fileName.'.php"';
//    $file_contents = file_get_contents($path_to_file);
//    $file_contents = str_replace($oldString, $newString, $file_contents);
//    file_put_contents($path_to_file,$file_contents);
    

}

	


?>