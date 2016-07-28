<?php
//require '../../atomic-config.php';
require '../temp-functions/edit-category-functions.php';
require '../temp-functions/db-functions.php';
require '../temp-functions/validation.php';

global $catdb;
global $compdb;
require "../fllat.php";

$catdb = new Fllat("categories", "../db");
$compdb = new Fllat("components", "../db");
$catName = $_POST["catName"];
$thisCat = $_POST["thisCat"];
$key = "category";

$errors         = array();
$data           = array();


/*if ($catName == $thisCat){
    $errors['different'] = ' <span class="u_textUnderline">'.$thisCat .' </span>correctly.';
}*/



if ($_POST['catName'] == ""){
    $errors['name'] = 'Input is required.';
}


if ( ! empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {





    dbUpdateItems($catdb, $key, $thisCat, $catName);
    dbUpdateItems($compdb, $key, $thisCat, $catName);
    renameCompDir($thisCat, $catName);
    renameStyleDir($thisCat, $catName);
    changeRootStylesImportString($catName, $thisCat);







    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


