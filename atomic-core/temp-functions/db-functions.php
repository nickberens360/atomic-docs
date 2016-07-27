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