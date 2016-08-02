<?php
require '../temp-functions/functions.php';


require "../fllat.php";

$catdb = new Fllat("categories", "../../atomic-db");
$compdb = new Fllat("components", "../../atomic-db");
$catName = $_POST["catName"];
$thisCat = $_POST["thisCat"];
$key = "category";

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




    deleteCompDir($catName);
    deleteScssDir($catName);
    deleteCatStylesImportString($catName);
    deleteDbRowByVal($compdb, $key, $catName);
    deleteDbRowByVal($catdb, $key, $catName);





    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


