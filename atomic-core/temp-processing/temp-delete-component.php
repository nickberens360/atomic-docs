<?php
require '../temp-functions/functions.php';


global $compdb;
require "../fllat.php";

$compdb = new Fllat("components", "../../atomic-db");
$key = "component";

$catName = $_POST["catName"];
$compName = $_POST["compName"];
$hasJs = $_POST["hasJs"];


$errors = array();
$data = array();



if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {



    deleteDbRowByVal($compdb, $key, $compName);
    deleteCompFile($catName, $compName);
    deleteStyleFile($catName, $compName);
    deleteScssImportString($catName, $compName);


    if($hasJs == "true"){
        deleteJsFile($compName);
    }











    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


