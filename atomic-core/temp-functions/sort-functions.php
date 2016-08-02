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
    $config = getConfig('../..');

    $stylesDir = $config[0]['styles_directory'];
    $stylesExt = $config[0]['styles_extension'];


    $string = "";
    foreach ($catName as $cn) {
        $string .= '@import "'.$cn.'/_'.$cn.'";'.PHP_EOL.'';
    }
    $path = '../../'.$stylesDir.'/main.'.$stylesExt.'';
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

    $config = getConfig('../..');

    $stylesDir = $config[0]['styles_directory'];
    $stylesExt = $config[0]['styles_extension'];

    $string = "";
    foreach ($compName as $cn) {
        $string .= '@import "_'.$cn.'";'.PHP_EOL.'';
    }
    $path = '../../'.$stylesDir.'/'.$catName.'/_'.$catName.'.'.$stylesExt.'';
    file_put_contents($path, $string);
}





function deleteStylesImportString($thisCompName, $oldCat)
{

    $config = getConfig('../..');

    $stylesDir = $config[0]['styles_directory'];
    $stylesExt = $config[0]['styles_extension'];

    $importString = '@import "_'.$thisCompName.'";';


    //Place contents of file into variable
    $contents = file_get_contents('../../'.$stylesDir.'/'.$oldCat.'/_'.$oldCat.'.'.$stylesExt.'');
    $contents = str_replace($importString, "", $contents);
    file_put_contents('../../'.$stylesDir.'/'.$oldCat.'/_'.$oldCat.'.'.$stylesExt.'', $contents);
}




function moveCompFile($oldCat, $thisCompName, $newCat)
{

    $config = getConfig('../..');

    $compsDir = $config[0]['component_directory'];
    $compExt = $config[0]['component_extension'];

    rename ("../../$compsDir/$oldCat/$thisCompName.$compExt", "../../$compsDir/$newCat/$thisCompName.$compExt");
}


function moveStyleFile($oldCat, $thisCompName, $newCat)
{
    $config = getConfig('../..');

    $stylesDir = $config[0]['styles_directory'];
    $stylesExt = $config[0]['styles_extension'];

    rename ("../../$stylesDir/$oldCat/_$thisCompName.$stylesExt", "../../$stylesDir/$newCat/_$thisCompName.$stylesExt");
}