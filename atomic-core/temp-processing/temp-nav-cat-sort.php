<?php

require '../temp-functions/functions.php';

global $catdb;
require "../fllat.php";

$catdb = new Fllat("categories", "../../atomic-db");

$errors = array();
$data = array();

$catName = $_POST["catName"];



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








