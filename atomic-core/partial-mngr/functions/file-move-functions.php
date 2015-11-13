<?php

function moveScssFile($catName, $fileName, $newDir)
{	
    rename ("../scss/$catName/_$fileName.scss", "../scss/$newDir/_$fileName.scss");
}




function moveCompFile($catName, $fileName, $newDir)
{	
    rename ("../components/$catName/$fileName.php", "../components/$newDir/$fileName.php");
}

function moveAjaxFile($catName, $fileName, $newDir)
{	
    rename ("actions/$catName/_ajaxComp-$fileName.php", "actions/$newDir/_ajaxComp-$fileName.php");
}

?>
