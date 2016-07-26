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



function navCompOrder($db, $compName)
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


function navCatCompOrder($db, $compName, $newCat)
{

    $selectDB = $db->select(array());
    $newOrder = 0;

    foreach ($compName as $cn) {

        foreach ($selectDB as $id => $item) {
            if ($item["component"] == $cn) {
                $update_order = array("order" => $newOrder);
                $db->update($id, $update_order);
                $newOrder++;
                $update_cat = array("category" => $newCat);
                $db->update($id, $update_cat);
                break;
            }
        }

    }
}






function stylesCompRootOrder($compName, $catName)
{
    $string = "";
    foreach ($compName as $cn) {
        $string .= '@import "_'.$cn.'";'.PHP_EOL.'';
    }
    $path = '../../scss/'.$catName.'/_'.$catName.'.scss';
    file_put_contents($path, $string);
}





function deleteStylesImportString($thisCompName, $oldCat)
{

    $importString = '@import "_'.$thisCompName.'";';


    //Place contents of file into variable
    $contents = file_get_contents('../../scss/'.$oldCat.'/_'.$oldCat.'.scss');
    $contents = str_replace($importString, "", $contents);
    file_put_contents('../../scss/'.$oldCat.'/_'.$oldCat.'.scss', $contents);
}




function moveCompFile($oldCat, $thisCompName, $newCat)
{
    rename ("../../components/$oldCat/$thisCompName.php", "../../components/$newCat/$thisCompName.php");
}


function moveStyleFile($oldCat, $thisCompName, $newCat)
{
    rename ("../../scss/$oldCat/_$thisCompName.scss", "../../scss/$newCat/_$thisCompName.scss");
}