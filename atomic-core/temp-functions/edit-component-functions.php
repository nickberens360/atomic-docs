<?php

function dbUpdateComp($db, $oldName, $newName, $catName, $bgColor, $compNotes){

    $selectDB = $db->select(array());

    for($i=count($selectDB)-1; $i>=0; $i--){

        if ($selectDB[$i]["component"] == $oldName && $selectDB[$i]["category"] == $catName) {
            $new_name = array("component" => $newName);
            $db->update($i, $new_name);

            $new_notes = array("description" => $compNotes);
            $db->update($i, $new_notes);

            $new_bg = array("backgroundColor" => $bgColor);
            $db->update($i, $new_bg);

        }
    }
}

function renameCompFile($catName, $newName, $oldName){

    $old = "../../components/$catName/$oldName.php";
    $new = "../../components/$catName/$newName.php";

    rename($old,$new);
}







function editCompCommentString($catName, $oldName, $newName)
{

    $oldString = '<!--components/'.$catName.'/'.$oldName.'.php -->';
    $newString = '<!--components/'.$catName.'/'.$newName.'.php -->';


    $contents = file_get_contents('../../components/'.$catName.'/'.$newName.'.php');
    $contents = str_replace($oldString, $newString , $contents);
    file_put_contents('../../components/'.$catName.'/'.$newName.'.php', $contents);
}










function renameStylesFile($catName, $newName, $oldName){

    $old = "../../scss/$catName/_$oldName.scss";
    $new = "../../scss/$catName/_$newName.scss";

    rename($old,$new);
}

function editStyleCommentString($catName, $oldName, $newName)
{

    $oldString = '/* scss/'.$catName.'/_'.$oldName.'.scss */';
    $newString = '/* scss/'.$catName.'/_'.$newName.'.scss */';


    $contents = file_get_contents('../../scss/'.$catName.'/_'.$newName.'.scss');
    $contents = str_replace($oldString, $newString , $contents);
    file_put_contents('../../scss/'.$catName.'/_'.$newName.'.scss', $contents);
}




function editStyleRootImportString($catName, $oldName, $newName)
{

    $oldString = '@import "_'.$oldName.'";';
    $newString = '@import "_'.$newName.'";';


    $contents = file_get_contents('../../scss/'.$catName.'/_'.$catName.'.scss');
    $contents = str_replace($oldString, $newString , $contents);
    file_put_contents('../../scss/'.$catName.'/_'.$catName.'.scss', $contents);
}




















