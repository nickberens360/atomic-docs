<?php



function deleteCompFile($catName, $fileName)
{
    unlink('../../components/'.$catName.'/'.$fileName.'.php');
}

function deleteStyleFile($catName, $fileName)
{
    unlink('../../scss/'.$catName.'/_'.$fileName.'.scss');
}



function deleteScssImportString($catName, $fileName)
{

    $importString = "@import " . '"_'.$fileName.'";' ;
    //Place contents of file into variable
    $contents = file_get_contents('../../scss/'.$catName.'/_'.$catName.'.scss');
    $contents = str_replace($importString, "", $contents);
    file_put_contents('../../scss/'.$catName.'/_'.$catName.'.scss', $contents);
}