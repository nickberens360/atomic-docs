<?php
require '../temp-functions/functions.php';

global $compdb;
require "../fllat.php";

$compdb = new Fllat("components", "../../atomic-db");




$errors = array();      // array to hold validation errors
$data = array();      // array to pass back data


$catName = test_input($_POST["catName"]);
$compName = test_input($_POST["compName"]);
$compNotes = test_input($_POST["compNotes"]);
$bgColor = test_input($_POST["bgColor"]);

$js_file = test_input($_POST["js_file"]);




$config = getConfig('../..');

$stylesDir = $config[0]['styles_directory'];
$stylesExt = $config[0]['styles_extension'];
$compDir = $config[0]['component_directory'];
$compExt = $config[0]['component_extension'];
$jsDir = $config[0]['js_directory'];
$jsExt = $config[0]['js_extension'];


$filename = '../../'.$compDir.'/'.$catName.'/'.$compName.'.'.$compExt.'';
$scssFilePath = '../../'.$stylesDir.'/'.$catName.'/_'.$compName.'.'.$stylesExt.'';

if (file_exists($filename) || file_exists($scssFilePath) && $catName != ""){
    $errors['exists'] = 'The component '.$compName.' already exists.';
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



    if($js_file == "true"){

        createJsFile($compName, $jsDir, $jsExt);
        createJsComment($compName);


    }



    addCompDbItem($compName, $catName, $compNotes, $bgColor, $js_file, $compdb);
    createCompFile($catName, $compName);
    createCompComment($catName, $compName);
    createStylesFile($catName, $compName);
    createStyleComment($catName, $compName);
    writeStylesImport($catName, $compName);





    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);


