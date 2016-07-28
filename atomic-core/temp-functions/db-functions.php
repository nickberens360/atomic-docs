<?php

function addCatDbItem($catName, $catdb){
    $newCat = array("category" => $catName, "order" => 1000);
    $catdb -> add($newCat);
}




function deleteDbRowByVal($db, $key, $value){

    $selectDB = $db->select(array());

    for($i=count($selectDB)-1; $i>=0; $i--){

        if ($selectDB[$i][$key] == $value) {
            $db ->rm($i);
        }
    }
}


function dbUpdateItems($db, $key, $oldValue, $update_value){

    $selectDB = $db->select(array());

    for($i=count($selectDB)-1; $i>=0; $i--){

        if ($selectDB[$i][$key] == $oldValue) {
            $new_value = array($key => $update_value);
            $db->update($i, $new_value);
        }
    }
}



function addCompDbItem($compName, $catName, $compNotes, $bgColor, $db){
    $newComp = array("component" => $compName, "category" => $catName, "description" => $compNotes, "backgroundColor" => $bgColor, "order" => 1000);
    $db -> add($newComp);
}