<?php
require '../temp-functions/functions.php';


require "../fllat.php";

$catdb = new Fllat("categories", "../../atomic-db");
$compdb = new Fllat("components", "../../atomic-db");
$settingsdb = new Fllat("settings", "../../atomic-db");

$catName = $_POST["catName"];
$thisCat = $_POST["thisCat"];
$key = "category";


/*$config = getConfig('../..');

$jsDir = $config[0]['js_directory'];
$jsExt = $config[0]['js_extension'];*/


$settingsdb = $settingsdb->select(array());

$jsDir = $settingsdb[0]['js_directory'];
$jsExt = $settingsdb[0]['js_extension'];
$compDir = $settingsdb[0]['component_directory'];
$compExt = $settingsdb[0]['component_extension'];







$errors         = array();
$data           = array();


if ($catName !== $thisCat){
    $errors['different'] = 'You did not spell <span class="u_textUnderline">'.$thisCat .' </span>correctly.';
}



if ($_POST['catName'] == ""){
    $errors['name'] = 'Input is required.';
}


if ( ! empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {




    

    deleteCatJsFile($jsDir, $jsExt, $compDir, $thisCat);

    deleteCompDir($catName);
    deleteScssDir($catName);
    deleteCatStylesImportString($catName);
    deleteDbRowByVal($compdb, $key, $catName);
    deleteDbRowByVal($catdb, $key, $catName);











    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


