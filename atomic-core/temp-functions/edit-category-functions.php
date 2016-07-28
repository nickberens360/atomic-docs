<?php
function renameCompDir($oldDir, $newDir){
    $oldDir = "../../components/$oldDir";
    $newDir = "../../components/$newDir";

    rename($oldDir,$newDir);
}


function renameStyleDir($oldDir, $newDir){
    $oldDir = "../../scss/$oldDir";
    $newDir = "../../scss/$newDir";

    rename($oldDir,$newDir);
}

function changeRootStylesImportString($catName, $oldName)
{

    $oldString = '@import "'.$oldName.'/_'.$oldName.'";';
    $newString = '@import "'.$catName.'/_'.$catName.'";';

    
    $contents = file_get_contents('../../scss/main.scss');
    $contents = str_replace($oldString, $newString , $contents);
    file_put_contents('../../scss/main.scss', $contents);
}