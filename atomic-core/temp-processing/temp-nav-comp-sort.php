<?php

require '../temp-functions/functions.php';

global $compdb;
require "../fllat.php";


$compdb = new Fllat("components", "../../atomic-db");

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



    stylesCompRootOrder($compName, $catName);

    navCompOrder($compdb, $compName);


    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);








