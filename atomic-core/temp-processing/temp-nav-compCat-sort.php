<?php

require "../temp-functions/sort-functions.php";

global $compdb;
require "../fllat.php";


$compdb = new Fllat("components", "../db");

$errors = array();
$data = array();

$compName = $_POST["compName"];
$newCat = $_POST["newCat"];
$oldCat = $_POST["oldCat"];
$thisCompName = $_POST["thisCompName"];





/*if ($newCode == ""){
    $errors['name'] = 'No change detected';
}*/

if (!empty($errors)) {

    $data['success'] = false;
    $data['errors'] = $errors;
} else {






    navCatCompOrder($compdb, $compName, $newCat);
    stylesCompRootOrder($compName, $newCat);
    deleteStylesImportString($thisCompName, $oldCat);
    moveCompFile($oldCat, $thisCompName, $newCat);
    moveStyleFile($oldCat, $thisCompName, $newCat);



    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);








