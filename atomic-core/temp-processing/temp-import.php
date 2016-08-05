<?php
require '../temp-functions/functions.php';



require "../fllat.php";

$catdb = new Fllat("categories", "../../atomic-db");
$compdb = new Fllat("components", "../../atomic-db");


$config = getConfig('../..');
$stylesDir = $config[0]['styles_directory'];
$compDir = $config[0]['component_directory'];


$errors         = array();
$data           = array();






/*$filename = '../../'.$compDir.'/'.$catName.'';
$scssFilePath = '../../'.$stylesDir.'/'.$catName.'';

if (file_exists($filename) || file_exists($scssFilePath) && $catName != ""){
    $errors['exists'] = 'The category '.$catName .' already exists.';
}


if ($_POST['catName'] == ""){
    $errors['name'] = 'Input is required.';
}*/


if ( ! empty($errors)) {

    $data['success'] = false;
    $data['errors']  = $errors;
} else {

    $old_compDir = 'components';
    $old_compExt = 'php';




    function importComps($old_compDir, $old_compExt, $catdb, $compdb){

        $path = "../../$old_compDir";
        $dir = new DirectoryIterator($path);

        $addCats = array(array("category" => "", "order" => ""));
        $catdb -> rw($addCats);
        $catdb -> rm(0);

        $addComps = array(array("component" => "", "category" => "", "description" => "", "backgroundColor" => "", "order" => ""));
        $compdb -> rw($addComps);
        $compdb -> rm(0);


        $i=0;

        foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {

                $i++;

                $dirs = $fileinfo->getFilename();



                $addCats = array("category" => $dirs, "order" => "$i");
                $catdb -> add($addCats);





                $i2=0;
                foreach (glob("../../$old_compDir/$dirs/*.$old_compExt") as $filename) {

                    $i2++;
                    $filenameBase = basename("$filename", ".$old_compExt");


                    $addComps = array("component" => "$filenameBase", "category" => "$dirs", "description" => "", "backgroundColor" => "", "order" => "$i2");
                    $compdb -> add($addComps);

                    //var_dump($filenameBase);



                }

            }
        }
    }

    importComps($old_compDir, $old_compExt, $catdb, $compdb);





    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


