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


$filename = '../../components/'.$newCat.'/'.$thisCompName.'.php';
$scssFilePath = '../../scss/'.$newCat.'/_'.$thisCompName.'.scss';

if (file_exists($filename) || file_exists($scssFilePath) && $catName != ""){
    $errors['exists'] = 'A component named '.$thisCompName .' already exists in the target location.';
}






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








