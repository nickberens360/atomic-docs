<?php

require '../temp-functions/functions.php';

global $compdb;
require "../fllat.php";


$compdb = new Fllat("components", "../../atomic-db");

$errors = array();
$data = array();

$compName = $_POST["compName"];
$newCat = $_POST["newCat"];
$oldCat = $_POST["oldCat"];
$thisCompName = $_POST["thisCompName"];


$config = getConfig('../..');

$stylesDir = $config[0]['styles_directory'];
$stylesExt = $config[0]['styles_extension'];
$compDir = $config[0]['component_directory'];
$compExt = $config[0]['component_extension'];


$filename = '../../'.$compDir.'/'.$newCat.'/'.$thisCompName.'.'.$compExt.'';
$scssFilePath = '../../'.$stylesDir.'/'.$newCat.'/_'.$thisCompName.'.'.$stylesExt.'';

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

    editAllCompCommentStrings($oldCat, $newCat);


    editAllStyleCommentStrings($oldCat, $newCat);



    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);








