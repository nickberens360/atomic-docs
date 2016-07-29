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



function renameStylesRoot( $newName, $oldName){

    $old = "../../scss/$newName/_$oldName.scss";
    $new = "../../scss/$newName/_$newName.scss";

    rename($old,$new);
}


function editAllCompCommentStrings($oldCat, $newCat)
{
    foreach (glob("../../components/$newCat/*.php") as $filename) {


        $oldString = '<!--components/' . $oldCat . '/';
        $newString = '<!--components/' . $newCat . '/';

        $contents = file_get_contents($filename);
        $contents = str_replace($oldString, $newString, $contents);

        file_put_contents($filename, $contents);

    }
}

function editAllStyleCommentStrings($oldCat, $newCat)
{
    foreach (glob("../../scss/$newCat/*.scss") as $filename) {


        $oldString = '/* scss/'.$oldCat.'/';
        $newString = '/* scss/'.$newCat.'/';

        $contents = file_get_contents($filename);
        $contents = str_replace($oldString, $newString, $contents);

        file_put_contents($filename, $contents);

    }
}