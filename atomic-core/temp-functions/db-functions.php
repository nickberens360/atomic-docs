<?php

function addCatDbItem($catName, $catdb){

    $categories = $catdb->select(array());

    $i=count($categories);


    $newCat = array("category" => $catName, "order" => $i+1);
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
    $i=count($db)+1;
    $newComp = array("component" => $compName, "category" => $catName, "description" => $compNotes, "backgroundColor" => $bgColor, "order" => $i);
    $db -> add($newComp);
}