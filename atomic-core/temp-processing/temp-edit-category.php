<?php
require '../temp-functions/functions.php';

include '../db-inc/dbinc.php';



$catName = $_POST["catName"];
$thisCat = $_POST["thisCat"];
$key = "category";

$errors         = array();
$data           = array();


/*if ($catName == $thisCat){
    $errors['different'] = ' <span class="u_textUnderline">'.$thisCat .' </span>correctly.';
}*/



if ($_POST['catName'] == ""){
    $errors['name'] = 'Input is required.';
}


if ( ! empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {





    dbUpdateItems($catdb, $key, $thisCat, $catName);
    dbUpdateItems($compdb, $key, $thisCat, $catName);
    renameCompDir($thisCat, $catName);
    //update all comp file comment strings
    renameStyleDir($thisCat, $catName);
    renameStylesRoot($catName, $thisCat );
    //update all style file comment stings
    changeRootStylesImportString($catName, $thisCat);






    editAllCompCommentStrings($thisCat, $catName);





    editAllStyleCommentStrings($thisCat, $catName);




    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


