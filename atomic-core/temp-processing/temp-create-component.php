<?php
require '../temp-functions/create-component-functions.php';
require '../temp-functions/db-functions.php';
require '../temp-functions/validation.php';

global $compdb;
require "../fllat.php";

$compdb = new Fllat("components", "../db");


$errors = array();      // array to hold validation errors
$data = array();      // array to pass back data


$catName = test_input($_POST["catName"]);
$compName = test_input($_POST["compName"]);
$compNotes = test_input($_POST["compNotes"]);
$bgColor = test_input($_POST["bgColor"]);


/*$fileExists = '../../components/'.$catName.'/'.$compName.'.php';

if (file_exists($fileExists) && $fileCreateName != ""){
    $errors['exists'] = 'A file named '.$compName.' already exists.';
}*/


$filename = '../../components/'.$catName.'/'.$compName.'.php';
$scssFilePath = '../../scss/'.$catName.'/_'.$compName.'.scss';

if (file_exists($filename) || file_exists($scssFilePath) && $catName != ""){
    $errors['exists'] = 'The component '.$compName .' already exists.';
}




if ($_POST['compName'] == ""){
    $errors['name'] = 'Component name is required.';
}


// return a response ===========================================================

// if there are any errors in our errors array, return a success boolean of false
if (!empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {


    addCompDbItem($compName, $catName, $compNotes, $bgColor, $compdb);
    createCompFile($catName, $compName);
    createCompComment($catName, $compName);
    createStylesFile($catName, $compName);
    createStyleComment($catName, $compName);
    writeStylesImport($catName, $compName);





    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);


?>


