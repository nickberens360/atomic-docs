<?php

function addCatDbItem($catName, $catdb){
    $newCat = array("category" => $catName, "order" => 1000);
    $catdb -> add($newCat);
}