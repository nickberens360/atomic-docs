<?php
require '../temp-functions/functions.php';


require "../fllat.php";

$settings = new Fllat("settings", "../../atomic-db");

$catName = $_POST["catName"];
$thisCat = $_POST["thisCat"];
$key = "category";

$errors         = array();
$data           = array();



/*if ($_POST['catName'] == ""){
    $errors['name'] = 'Input is required.';
}*/


if ( ! empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {











    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


