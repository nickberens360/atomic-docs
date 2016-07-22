<?php
require '../../atomic-config.php';
require '../temp-functions/create-category-functions.php';
require '../temp-functions/validation.php';



$config = getConfig();
$preCssDir = $config['preCssDir'];

$errors         = array();
$data           = array();

// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

$catName = test_input($_POST["catName"]);



$filename = '../../components/'.$catName.'';
$scssFilePath = '../../'.$preCssDir.'/'.$catName.'';

if (file_exists($filename) || file_exists($scssFilePath) && $catName != ""){
    $errors['exists'] = 'The category '.$catName .' already exists.';
}
if ($_POST['catName'] == ""){
    $errors['name'] = 'Name is required.';
}


if ( ! empty($errors)) {

    $data['success'] = false;
    $data['errors']  = $errors;
} else {




    $json = file_get_contents('../db/data.json');
    //$appDB = json_decode($json, true);

    $json = substr($json, 0, -3);

    //var_dump($json);

    $newCat = ',
  {
    "category": "'.$catName.'",
    "components":[
      {"component":"","description": "", "bgColor": ""}
    ]
  }
]';



   /*$newDB = $json.$newCat;

    echo $newDB;

    file_put_contents('../db/data.json', $newDB);





    createCompCatDir($catName );

    createScssCatDirAndFile($catName );

    createStringForMainScssFile($catName );*/




    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


