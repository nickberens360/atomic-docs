<?php
require '../temp-functions/functions.php';
require "../fllat.php";

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$compName = $_POST["compName"];
$catName = $_POST["catName"];
$newCode = $_POST["newCode"];
$codeDest = $_POST["codeDest"];






if ($newCode == ""){
    $errors['name'] = 'No change detected';
}
// return a response ===========================================================
// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message
    // DO ALL YOUR FORM PROCESSING HERE
    function editorCodeUpdate($compName,$catName, $newCode, $codeDest){

        $config = getConfig('../..');


        $compExt = $config[0]['component_extension'];
        $stylesExt = $config[0]['styles_extension'];
        $stylesDir = $config[0]['styles_directory'];
        $compDir = $config[0]['component_directory'];



        if($codeDest == $compDir){
            $compName = $compName.'.'.$compExt.'';
        }
        if($codeDest == $stylesDir){
            $compName = '_'.$compName.'.'.$stylesExt.'';
        }
        $path = '../../'.$codeDest.'/'.$catName.'/'.$compName;
        file_put_contents($path, $newCode);
    }
    editorCodeUpdate($compName,$catName, $newCode, $codeDest);
    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);