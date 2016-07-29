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

function renameStylesFile($catName, $newName, $oldName){

    $old = "../../scss/$catName/_$oldName.scss";
    $new = "../../scss/$catName/_$newName.scss";

    rename($old,$new);
}