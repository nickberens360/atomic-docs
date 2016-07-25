<?php

require "../temp-functions/sort-functions.php";

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



    stylesRootOrder($catName);

    navCatOrder($catdb, $catName);


    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);








