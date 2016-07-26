<?php
//require '../../atomic-config.php';
require '../temp-functions/create-category-functions.php';
require '../temp-functions/db-functions.php';
require '../temp-functions/validation.php';

global $catdb;
require "../fllat.php";

$catdb = new Fllat("categories", "../db");


$errors         = array();
$data           = array();

// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

$catName = test_input($_POST["catName"]);



$filename = '../../components/'.$catName.'';
$scssFilePath = '../../scss/'.$catName.'';

if (file_exists($filename) || file_exists($scssFilePath) && $catName != ""){
    $errors['exists'] = 'The category '.$catName .' already exists.';
}


if ($_POST['catName'] == ""){
    $errors['name'] = 'Input is required.';
}


if ( ! empty($errors)) {

    $data['success'] = false;
    $data['errors']  = $errors;
} else {




    addCatDbItem($catName, $catdb);
    createScssCatDirAndFile($catName);
    createStringForMainScssFile($catName);
    createCompCatDir($catName);





    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


