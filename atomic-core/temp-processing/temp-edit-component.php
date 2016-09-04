<?php
require '../temp-functions/functions.php';


global $compdb;
require "../fllat.php";

$compdb = new Fllat("components", "../../atomic-db");





$newName = $_POST["newName"];
$catName = $_POST["catName"];
$compNotes = $_POST["compNotes"];
$bgColor = $_POST["bgColor"];
$dataColor = $_POST["dataColor"];
$create_js_file = $_POST["js_file"];
$hasJs = $_POST["hasJs"];
$oldName = $_POST["oldName"];

$config = getConfig('../..');

$jsDir = $config[0]['js_directory'];
$jsExt = $config[0]['js_extension'];



$errors = array();
$data = array();




if ($_POST['newName'] == "") {
    $errors['name'] = 'Input is required.';
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {


    if( empty($bgColor) ){
        $bgColor = $dataColor;
    }
    else{
        $bgColor = $bgColor;
    }



    if($create_js_file == "true"){
        createJsFile($newName, $jsDir, $jsExt);
        createJsComment($newName);

        $create_js_file = "true";

        $hasJs = "true";
    }


    if($hasJs == "true"){
        renameJsFile($newName, $oldName);
        editJsCommentString($oldName, $newName);
    }



    dbUpdateComp($compdb, $oldName, $newName, $catName, $bgColor, $compNotes, $hasJs);
    
    
    renameCompFile($catName, $newName, $oldName);
    editCompCommentString($catName, $oldName, $newName);
    renameStylesFile($catName, $newName, $oldName);
    editStyleCommentString($catName, $oldName, $newName);
    editStyleRootImportString($catName, $oldName, $newName);
















    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


