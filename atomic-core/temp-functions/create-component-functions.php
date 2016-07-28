<?php




function createCompFile($catName, $compName)
{
    fopen("../../components/$catName/$compName.php", 'x+') or die("can't open file");
}

function createCompComment($catName, $compName)
{
    $commentString = '<!--components/'.$catName.'/'.$compName.'.php -->';
    $commentString = "\n$commentString\n";
    $fileHandle = fopen('../../components/'.$catName.'/'.$compName.'.php', 'w') or die("can't open file");
    fwrite($fileHandle, $commentString);
    fclose($fileHandle);
    file_put_contents('../../components/'.$catName.'/'.$compName.'.php', implode(PHP_EOL, file('../../components/'.$catName.'/'.$compName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}



function createStylesFile($catName, $compName)
{
    fopen("../../scss/$catName/_$compName.scss", 'x+') or die("can't open file");
}

function createStyleComment($catName, $compName)
{
    $commentString = '/* scss/'.$catName.'/_'.$compName.'.scss */';
    $commentString = "\n$commentString\n";
    $fileHandle = fopen('../../scss/'.$catName.'/_'.$compName.'.scss', 'w') or die("can't open file");
    fwrite($fileHandle, $commentString);
    fclose($fileHandle);
    file_put_contents('../../scss/'.$catName.'/_'.$compName.'.scss', implode(PHP_EOL, file('../../scss/'.$catName.'/_'.$compName.'.scss', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}



function writeStylesImport($catName, $compName)
{


    //create @import string
    $importString = "@import " . '"_'.$compName.'";' ;
    $importString = "\n$importString\n";

    //open parent scss file and write @import string to it
    $fileHandle = fopen('../../scss/'.$catName.'/'.'_'.$catName.'.scss', 'a') or die("can't open file");
    fwrite($fileHandle, $importString);
    fclose($fileHandle);

    //remove any extra line breaks from file
    file_put_contents('../../scss/'.$catName.'/'.'_'.$catName.'.scss', implode(PHP_EOL, file('../../scss/'.$catName.'/'.'_'.$catName.'.scss', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}

/*
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
}*/












