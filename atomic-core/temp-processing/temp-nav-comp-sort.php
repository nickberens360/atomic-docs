<?php

global $compdb;
require "../fllat.php";


$compdb = new Fllat("components", "../db");

$errors = array();
$data = array();

$compName = $_POST["compName"];
$catName = $_POST["currentCat"];



/*if ($newCode == ""){
    $errors['name'] = 'No change detected';
}*/

if (!empty($errors)) {

    $data['success'] = false;
    $data['errors'] = $errors;
} else {

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

    stylesSubRootOrder($compName, $catName);

    navCatOrder($compdb, $compName);


    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);








