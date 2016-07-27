<?php



function deleteCompDir($catName) {

    $catName = '../../components/'.$catName;

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

    $catName = '../../scss/'.$catName;

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

    $importString ='@import "'.$catName.'/_'.$catName.'";';

    //Place contents of file into variable
    $contents = file_get_contents('../../scss/main.scss');

    $contents = str_replace($importString, "", $contents);
    file_put_contents('../../scss/main.scss', $contents);
}










