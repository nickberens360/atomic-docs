<?php
require '../temp-functions/functions.php';


global $compdb;
require "../fllat.php";

$compdb = new Fllat("components", "../../atomic-db");



$newName = $_POST["newName"];
$catName = $_POST["catName"];
$compNotes = $_POST["compNotes"];
$bgColor = $_POST["bgColor"];
$hasJs = $_POST["hasJs"];

$oldName = $_POST["oldName"];



$errors = array();
$data = array();




/*if ($_POST['newName'] == "") {
    $errors['name'] = 'Input is required.';
}*/


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {




echo $hasJs;



    /*dbUpdateComp($compdb, $oldName, $newName, $catName, $bgColor, $compNotes);
    renameCompFile($catName, $newName, $oldName);
    editCompCommentString($catName, $oldName, $newName);
    renameStylesFile($catName, $newName, $oldName);
    editStyleCommentString($catName, $oldName, $newName);
    editStyleRootImportString($catName, $oldName, $newName);*/





    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


