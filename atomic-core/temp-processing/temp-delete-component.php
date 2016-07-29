<?php
//require '../../atomic-config.php';
require '../temp-functions/delete-component-functions.php';
require '../temp-functions/db-functions.php';
require '../temp-functions/validation.php';


global $compdb;
require "../fllat.php";

$compdb = new Fllat("components", "../db");
$key = "component";

$catName = $_POST["catName"];
$compName = $_POST["compName"];


$errors = array();
$data = array();


/*if ($catName == $thisCat){
    $errors['different'] = ' <span class="u_textUnderline">'.$thisCat .' </span>correctly.';
}


if ($_POST['newName'] == "") {
    $errors['name'] = 'Input is required.';
}
*/

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {



    deleteDbRowByVal($compdb, $key, $compName);
    deleteCompFile($catName, $compName);
    deleteStyleFile($catName, $compName);
    deleteScssImportString($catName, $compName);









    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


