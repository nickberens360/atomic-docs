<?php
require '../temp-functions/functions.php';



require "../fllat.php";

$catdb = new Fllat("categories", "../../atomic-db");


$config = getConfig('../..');
$stylesDir = $config[0]['styles_directory'];
$compDir = $config[0]['component_directory'];


$errors         = array();
$data           = array();



$catName = test_input($_POST["catName"]);



$filename = '../../'.$compDir.'/'.$catName.'';
$scssFilePath = '../../'.$stylesDir.'/'.$catName.'';

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


