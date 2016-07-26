<?php





function createScssCatDirAndFile($catName)
{
    mkdir("../../scss/$catName");
    $fileHandle = fopen("../../scss/$catName/_$catName.scss", 'x+') or die("can't open file");
}





function createStringForMainScssFile($catName)
{


    $includeString ='@import "'.$catName.'/_'.$catName.'";';

    $includeString = "\n$includeString\n";

    $fileHandle = fopen('../../scss/main.scss', 'a') or die("can't open file");
    fwrite($fileHandle, $includeString);

    file_put_contents('../../scss/main.scss', implode(PHP_EOL, file('../../scss/main.scss', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}





function createCompCatDir($catName)
{

    mkdir("../../components/$catName");
}












