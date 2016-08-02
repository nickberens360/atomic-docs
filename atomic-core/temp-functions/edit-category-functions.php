<?php
function renameCompDir($oldDir, $newDir){

    $config = getConfig('../..');

    $compDir = $config[0]['component_directory'];

    $oldDir = "../../$compDir/$oldDir";
    $newDir = "../../$compDir/$newDir";

    rename($oldDir,$newDir);
}


function renameStyleDir($oldDir, $newDir){

    $config = getConfig('../..');

    $stylesDir = $config[0]['styles_directory'];

    $oldDir = "../../$stylesDir/$oldDir";
    $newDir = "../../$stylesDir/$newDir";

    rename($oldDir,$newDir);
}

function changeRootStylesImportString($catName, $oldName)
{

    $config = getConfig('../..');

    $stylesDir = $config[0]['styles_directory'];
    $stylesExt = $config[0]['styles_extension'];

    $oldString = '@import "'.$oldName.'/_'.$oldName.'";';
    $newString = '@import "'.$catName.'/_'.$catName.'";';


    $contents = file_get_contents('../../'.$stylesDir.'/main.'.$stylesExt.'');
    $contents = str_replace($oldString, $newString , $contents);
    file_put_contents('../../'.$stylesDir.'/main.'.$stylesExt.'', $contents);
}



function renameStylesRoot( $newName, $oldName){

    $config = getConfig('../..');

    $stylesDir = $config[0]['styles_directory'];
    $stylesExt = $config[0]['styles_extension'];

    $old = "../../$stylesDir/$newName/_$oldName.$stylesExt";
    $new = "../../$stylesDir/$newName/_$newName.$stylesExt";

    rename($old,$new);
}


function editAllCompCommentStrings($oldCat, $newCat)
{
    $config = getConfig('../..');

    $compDir = $config[0]['component_directory'];
    $compExt = $config[0]['component_extension'];

    foreach (glob("../../$compDir/$newCat/*.$compExt") as $filename) {


        $oldString = '<!-- '.$compDir.'/' . $oldCat . '/';
        $newString = '<!-- '.$compDir.'/' . $newCat . '/';

        $contents = file_get_contents($filename);
        $contents = str_replace($oldString, $newString, $contents);

        file_put_contents($filename, $contents);

    }
}

function editAllStyleCommentStrings($oldCat, $newCat)
{

    $config = getConfig('../..');

    $stylesDir = $config[0]['styles_directory'];
    $stylesExt = $config[0]['styles_extension'];

    foreach (glob("../../$stylesDir/$newCat/*.$stylesExt") as $filename) {


        $oldString = '/* '.$stylesDir.'/'.$oldCat.'/';
        $newString = '/* '.$stylesDir.'/'.$newCat.'/';

        $contents = file_get_contents($filename);
        $contents = str_replace($oldString, $newString, $contents);

        file_put_contents($filename, $contents);

    }
}