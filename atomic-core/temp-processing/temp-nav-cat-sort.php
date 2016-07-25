<?php

global $catdb;
require "../fllat.php";

//$catdb = new Fllat("category");
$catdb = new Fllat("categories", "../db");

$errors = array();
$data = array();

$catName = $_POST["catName"];

/*if ($newCode == ""){
    $errors['name'] = 'No change detected';
}*/

if (!empty($errors)) {

    $data['success'] = false;
    $data['errors'] = $errors;
} else {

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

    stylesRootOrder($catName);

    navCatOrder($catdb, $catName);


    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);








