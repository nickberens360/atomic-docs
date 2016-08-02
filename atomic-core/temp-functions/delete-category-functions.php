<?php



function deleteCompDir($catName) {

    $config = getConfig('../..');
    $compDir = $config[0]['component_directory'];

    $catName = '../../'.$compDir.'/'.$catName;

    if (is_dir($catName)) {
        $objects = scandir($catName);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($catName."/".$object) == "dir") deleteCompDir($catName."/".$object); else unlink($catName."/".$object);
            }
        }
        reset($objects);
        rmdir($catName);
    }
}



function deleteScssDir($catName) {

    $config = getConfig('../..');
    $stylesDir = $config[0]['styles_directory'];

    $catName = '../../'.$stylesDir.'/'.$catName;

    if (is_dir($catName)) {
        $objects = scandir($catName);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($catName."/".$object) == "dir") deleteCompDir($catName."/".$object); else unlink($catName."/".$object);
            }
        }
        reset($objects);
        rmdir($catName);
    }
}



function deleteCatStylesImportString($catName)
{

    $config = getConfig('../..');
    $stylesDir = $config[0]['styles_directory'];
    $stylesExt = $config[0]['styles_extension'];

    $importString ='@import "'.$catName.'/_'.$catName.'";';

    //Place contents of file into variable
    $contents = file_get_contents('../../'.$stylesDir.'/main.'.$stylesExt.'');

    $contents = str_replace($importString, "", $contents);
    file_put_contents('../../'.$stylesDir.'/main.'.$stylesExt.'', $contents);
}










