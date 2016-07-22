<?php







function createScssCatDirAndFile($dirName)
{

    $config = getConfig();
    $cssDir = $config['preCssDir'];
    $cssExt = $config['preCssExt'];

    mkdir("../../$cssDir/$dirName");
    $fileHandle = fopen("../../$cssDir/$dirName/_$dirName.$cssExt", 'x+') or die("can't open file");
}



function createStringForMainScssFile($dirName)
{

    $config = getConfig();
    $cssDir = $config['preCssDir'];
    $cssExt = $config['preCssExt'];

    $includeString ='@import "'.$dirName.'/_'.$dirName.'";';

    $includeString = "\n$includeString\n";

    $fileHandle = fopen('../../'.$cssDir.'/main.'.$cssExt.'', 'a') or die("can't open file");
    fwrite($fileHandle, $includeString);

    file_put_contents('../../'.$cssDir.'/main.'.$cssExt.'', implode(PHP_EOL, file('../../'.$cssDir.'/main.'.$cssExt.'', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}





function createCompCatDir($dirName)
{

    mkdir("../../components/$dirName");
}












