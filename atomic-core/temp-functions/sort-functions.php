<?php

function navCatOrder($db, $catName)
{

    $selectDB = $db->select(array());
    $newOrder = 0;

    foreach ($catName as $cn) {

        foreach ($selectDB as $id => $item) {
            if ($item["category"] == $cn) {
                $update_order = array("order" => $newOrder);
                $db->update($id, $update_order);
                $newOrder++;
                break;
            }
        }

    }
}

function stylesRootOrder($catName)
{
    $string = "";
    foreach ($catName as $cn) {
        $string .= '@import "'.$cn.'/_'.$cn.'";'.PHP_EOL.'';
    }
    $path = '../../scss/main.scss';
    file_put_contents($path, $string);
}



function navCatOrder($db, $compName)
{

    $selectDB = $db->select(array());
    $newOrder = 0;

    foreach ($compName as $cn) {

        foreach ($selectDB as $id => $item) {
            if ($item["component"] == $cn) {
                $update_order = array("order" => $newOrder);
                $db->update($id, $update_order);
                $newOrder++;
                break;
            }
        }

    }
}

function stylesSubRootOrder($compName, $catName)
{
    $string = "";
    foreach ($compName as $cn) {
        $string .= '@import "_'.$cn.'";'.PHP_EOL.'';
    }
    $path = '../../scss/'.$catName.'/_'.$catName.'.scss';
    file_put_contents($path, $string);
}